<?php

namespace App\Containers\AccBillableTime\Tasks;

use App\Containers\AccBillableTime\Data\Repositories\AccBillableTimeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccBillableTimesTask extends Task
{

    protected $repository;

    public function __construct(AccBillableTimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
