<?php

namespace App\Containers\AccLatePayment\Tasks;

use App\Containers\AccLatePayment\Data\Repositories\AccLatePaymentRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccLatePaymentTask extends Task
{

    protected $repository;

    public function __construct(AccLatePaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

