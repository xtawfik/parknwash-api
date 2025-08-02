<?php

namespace App\Containers\AccRecurringCategory\Tasks;

use App\Containers\AccRecurringCategory\Data\Repositories\AccRecurringCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccRecurringCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
