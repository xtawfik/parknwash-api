<?php

namespace App\Containers\AccRecurringCategory\Tasks;

use App\Containers\AccRecurringCategory\Data\Repositories\AccRecurringCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccRecurringCategoriesTask extends Task
{

    protected $repository;

    public function __construct(AccRecurringCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
