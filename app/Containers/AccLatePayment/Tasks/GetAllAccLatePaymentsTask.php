<?php

namespace App\Containers\AccLatePayment\Tasks;

use App\Containers\AccLatePayment\Data\Repositories\AccLatePaymentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccLatePaymentsTask extends Task
{

    protected $repository;

    public function __construct(AccLatePaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
