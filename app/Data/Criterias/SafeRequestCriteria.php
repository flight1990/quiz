<?php
namespace App\Data\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Criteria\RequestCriteria;

class SafeRequestCriteria extends RequestCriteria
{
    protected function isRelationAllowed(array|string $allowedWith, string $relation): bool
    {
        if (is_string($allowedWith)) {
            return $allowedWith === $relation;
        }
        $parts = explode('.', $relation, 2);
        foreach ($allowedWith as $key => $value) {
            if (is_int($key) && $value === $parts[0]) {
                return count($parts) === 1;
            }
            if ($key === $parts[0]) {
                return count($parts) === 1 || (is_array($value) && isset($parts[1]) && $this->isRelationAllowed($value, $parts[1]));
            }
        }
        return false;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $request = $this->request;
        $allowedWith = $this->getAllowedFromRepo($repository, 'allowedWith') ?? [];
        $allowedSort = $this->getAllowedFromRepo($repository, 'allowedSort') ?? [];

        $with = $request->query('with', '');
        $orderBy = $request->query('orderBy', '');
        $sortedBy = strtolower($request->query('sortedBy', 'asc'));

        $cleanRequest = clone $request;

        foreach (['with', 'orderBy', 'sortedBy'] as $param) {
            $cleanRequest->query->remove($param);
        }
        $this->request = $cleanRequest;

        $model = parent::apply($model, $repository);

        if ($with) {
            $relations = array_filter(array_map('trim', explode(',', $with)));
            $allowedRelations = array_filter($relations, fn($r) => $this->isRelationAllowed($allowedWith, $r));
            if ($allowedRelations) {
                $model = $model->with($allowedRelations);
            }
        }

        if ($orderBy && in_array($orderBy, $allowedSort)) {
            $model = $model->orderBy($orderBy, in_array($sortedBy, ['asc','desc']) ? $sortedBy : 'asc');
        }

        $this->request = $request;
        return $model;
    }

    protected function getAllowedFromRepo(RepositoryInterface $repository, string $property): ?array
    {
        if (method_exists($repository, 'get'.ucfirst($property))) {
            return $repository->{'get'.ucfirst($property)}();
        }
        $reflection = new \ReflectionClass($repository);
        if ($reflection->hasProperty($property)) {
            $prop = $reflection->getProperty($property);
            return $prop->getValue($repository);
        }
        return null;
    }
}
