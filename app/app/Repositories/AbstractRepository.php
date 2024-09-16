<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /** @var Model|string */
    protected $model;

    public function __construct()
    {
        if ($this->model && is_string($this->model)) {
            $this->model = resolve($this->model);
        }
    }

    /**
     * @return mixed|Model
     */
    public function getModel(): mixed
    {
        return $this->model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }
}
