<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
   /**
     * Base Model
     *
     * @var mixed
     */
    protected $model = Model::class;

    /**
     * BaseRepository constructor.
     *
     * @param mixed $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Create Data
     *
     * @param array $attributes
     * @param string $connectionName
     *
     * @return Model
     */
    public function create(array $attributes, string $connectionName = 'mysql::write')
    {
        return $this->model->on($connectionName)->create($attributes);
    }

    /**
     * Update Data
     *
     * @param $id
     * @param array $attributes
     * @param string $connectionName
     *
     * @return Model
     */
    public function update($id, array $attributes, string $connectionName = 'mysql::write')
    {
        $model = $this->model->on($connectionName)->findOrFail($id);
        $update = $model->update($attributes);
        if ($model) {
            return $model;
        }

        return $update;
    }

    /**
     * Find Data By Condition
     *
     * @param array $key
     * @param mixed $selects
     * @param mixed $relations
     * @param mixed $orderBy
     * @param mixed $orderType
     * @param string $connectionName
     *
     * @return Model|null
     */
    public function findBy($key, $selects = '*', $relations = null, $orderBy = 'id', $orderType = 'asc', string $connectionName = 'mysql::read')
    {
        $data = $this->model->on($connectionName)->select($selects);

        if ($relations) {
            $data = $data->with($relations);
        }

        return $data->where($key)->orderBy($orderBy, $orderType)->first();
    }
}
