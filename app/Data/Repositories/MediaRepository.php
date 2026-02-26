<?php

namespace App\Data\Repositories;

use App\Data\Criterias\SafeRequestCriteria;
use App\Models\Media;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class MediaRepository extends BaseRepository
{
    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(SafeRequestCriteria::class));
    }

    public function model(): string
    {
        return Media::class;
    }
}
