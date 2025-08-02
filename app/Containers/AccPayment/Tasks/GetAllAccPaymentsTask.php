<?php

namespace App\Containers\AccPayment\Tasks;

use App\Containers\AccPayment\Data\Repositories\AccPaymentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPaymentsTask extends Task
{

    protected $repository;

    public function __construct(AccPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
