<?php

namespace App\Containers\AccRecurringCategory\Tasks;

use App\Containers\AccRecurringCategory\Data\Repositories\AccRecurringCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccRecurringCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

