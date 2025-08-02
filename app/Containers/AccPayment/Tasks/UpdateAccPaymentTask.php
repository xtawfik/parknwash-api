<?php

namespace App\Containers\AccPayment\Tasks;

use App\Containers\AccPayment\Data\Repositories\AccPaymentRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPaymentTask extends Task
{

    protected $repository;

    public function __construct(AccPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

