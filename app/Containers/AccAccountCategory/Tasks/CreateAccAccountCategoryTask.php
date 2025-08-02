<?php

namespace App\Containers\AccAccountCategory\Tasks;

use App\Containers\AccAccountCategory\Data\Repositories\AccAccountCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccAccountCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccAccountCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

