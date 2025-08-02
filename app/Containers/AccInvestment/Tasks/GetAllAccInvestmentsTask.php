<?php

namespace App\Containers\AccInvestment\Tasks;

use App\Containers\AccInvestment\Data\Repositories\AccInvestmentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccInvestmentsTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
