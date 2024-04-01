<?php

namespace App\Services\Users;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserPersonalRepository;


class UserPersonalService
{
    /**
     * constructor.
     *
     * @param UserPersonalRepository $repository
     */
    public function __construct(
        protected UserPersonalRepository $repository = new UserPersonalRepository(),
        protected UserRepository $repositoryUser = new UserRepository(),
    ) {
    }

    /**
     * Get All
     *
     * @return Array
     */
    public function getAll($columns = '*')
    {
        return $this->repository->getAll($columns);
    }

    /**
     * Find By
     *
     * @return Collection
     */
    public function findByKey($key, $selects = '*', $relations = null)
    {
        return $this->repository->findByKey($key, $selects, $relations);
    }

    /**
     * Create
     *
     */
    public function createUserPersonal($data)
    {
        $createUser = $this->repositoryUser->createData(
            data: [
                'username' => Str::random(10),
                'email_verified_at' => now(),
                'password' => Hash::make(Str::random(8)),
                'remember_token' => Str::random(10),
            ]
        );
        if ($createUser) {
            $data['user_id'] = $createUser->id;
            return $this->repository->createData($data);
        }
        return null;
    }

    /**
     * Update
     *
     * @return Model
     */
    public function update($id, $data)
    {
        return $this->repository->updateData($id, $data);
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
        return $this->repository->softDeleteById($id);
    }
}