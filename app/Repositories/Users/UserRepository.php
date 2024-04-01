<?php

namespace App\Repositories\Users;

use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $model = new User())
    {
        parent::__construct($model);
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
}
