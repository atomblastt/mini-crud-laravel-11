<?php

namespace App\Services\Users;

use App\Repositories\Users\UserRepository;

class UserService
{
    /**
     * constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(
        protected UserRepository $repository = new UserRepository(),
    ) {
    }

    /**
     * Create
     *
     * @return Model
     */
    public function create($data)
    {
        return $this->repository->createData($data);
    }
}