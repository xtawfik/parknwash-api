<?php

namespace App\Containers\AccPayslipItemCategory\Tasks;

use App\Containers\AccPayslipItemCategory\Data\Repositories\AccPayslipItemCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipItemCategoriesTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
