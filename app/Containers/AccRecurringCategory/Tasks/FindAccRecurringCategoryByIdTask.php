<?php

namespace App\Containers\AccRecurringCategory\Tasks;

use App\Containers\AccRecurringCategory\Data\Repositories\AccRecurringCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccRecurringCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
