<?php

namespace App\Containers\AccRecurringCategory\Tasks;

use App\Containers\AccRecurringCategory\Data\Repositories\AccRecurringCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccRecurringCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

