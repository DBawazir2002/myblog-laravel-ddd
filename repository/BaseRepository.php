<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Data;

/*
 *
 */
abstract class BaseRepository
{
    protected $model;

    abstract protected function setData();

    public function setModel($model): void
    {
        $this->model = $model;
    }

    protected function makeInstanceOfModel(): Model
    {
        return app($this->model);
    }

    public function __construct()
    {
        $this->setData();
    }

    public function index(): LengthAwarePaginator
    {
        return $this->makeInstanceOfModel()->query()->paginate();
    }

    public function store(Data $data): Model
    {
        $model = $this->makeInstanceOfModel()->query()->create($data->toArray());

        return $model->refresh();
    }

    public function update(Data $data, string $id): model
    {
        $model = $this->find($id);
        $model->update($data->toArray());

        return $model->refresh();
    }

    public function destroy(string $id): void
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function addMedia(Model $model, string $file, string $collection): void
    {
        if ($file) {
            if (isFile(request()->{$file})) {
                $model->addMediaFromRequest($file)->toMediaCollection($collection);
            }
        }
    }

    public function find(string $id): Model
    {
        return $this->makeInstanceOfModel()->query()->findOrFail($id);
    }

    public function count(): int
    {
        return $this->makeInstanceOfModel()->query()->count();
    }
}
