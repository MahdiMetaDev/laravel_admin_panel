<?php

namespace App\Http\services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{

//    protected string $Model;

    public function __construct(private Model $model)
    {
//        preg_match('/^.*App\\\Http\\\services\\\(\w+)\\\.*$/i', static::class, $matches);
//        $this->Model = 'App\\Models\\' . $matches[1];
    }

    public function index(): Collection
    {
        return $this->model->orderByDesc('id')->get();
    }

    public function store(array $payload = []): Model
    {
        return $this->model->create($payload);
    }

    public function update($model, array $payload): Model
    {
        $model->update($payload);

        return $model;
    }


    public function destroy($model): bool
    {
        return $model->delete();
    }
}
