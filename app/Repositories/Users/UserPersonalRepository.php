<?php

namespace App\Repositories\Users;

use App\Models\Users\UserPersonal;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserPersonalRepository extends BaseRepository
{
    public function __construct(UserPersonal $model = new UserPersonal())
    {
        parent::__construct($model);
    }

    /**
     * Get All
     *
     * @return Collection
     */
    public function getAll($columns = '*', $filter = [])
    {
        $data = $this->model->select($columns);

        if (! empty($filter)) {
            foreach ($filter as $key => $value) {
                $data = $data->orWhere($key, 'like', "%{$value}%");
            }
        }
        $data->orderBy('id', 'desc');
        return $data->get();
    }

    /**
     * findById
     *
     * @return Mixed
     */
    public function findByKey($key, $selects = '*', $relations = null, $sortBy = 'id', $sort = 'asc')
    {
        return $this->findBy(
            key: $key,
            selects: $selects,
            relations: $relations,
            orderBy: $sortBy,
            orderType: $sort
        );
    }

    /**
     * Create
     *
     * @return Model
     */
    public function createData($data)
    {
        return DB::transaction(function () use ($data) {
            return $this->create($data);
        });
    }

    /**
     * Update
     *
     * @return Model
     */
    public function updateData($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            return $this->update($id, $data);
        });
    }

    /**
     * Soft Delete By Id
     *
     * @param int $id
     *
     * @return Model|null
     */
    public function softDeleteById(int $id): ?Model
    {
        try {
            $data = $this->model->findOrFail($id);
            $data->delete();
            return $data;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
