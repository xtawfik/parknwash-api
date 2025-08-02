<?php

namespace App\Containers\AccPayslipItem\Tasks;

use App\Containers\AccPayslipItem\Data\Repositories\AccPayslipItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPayslipItemsTask extends Task
{

    protected $repository;

    public function __construct(AccPayslipItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
