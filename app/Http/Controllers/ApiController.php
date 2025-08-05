<?php

namespace App\Http\Controllers;
use App\Traits\ResponseTrait;

class ApiController extends Controller
{
    use ResponseTrait;

    protected string $ui;

    public function getUI(): string
    {
        return $this->ui;
    }

    public function setUI(string $interface): static
    {
        $this->ui = $interface;

        return $this;
    }
}
