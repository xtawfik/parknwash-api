<?php

namespace App\Containers\AccPayment\Tasks;

use App\Containers\AccPayment\Data\Repositories\AccPaymentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPaymentTask extends Task
{

    protected $repository;

    public function __construct(AccPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

