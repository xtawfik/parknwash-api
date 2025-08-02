<?php

namespace App\Containers\AccLatePayment\Tasks;

use App\Containers\AccLatePayment\Data\Repositories\AccLatePaymentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccLatePaymentTask extends Task
{

    protected $repository;

    public function __construct(AccLatePaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

