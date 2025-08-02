<?php

namespace App\Containers\PaymentMethod\Tasks;

use App\Containers\PaymentMethod\Data\Repositories\PaymentMethodRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePaymentMethodTask extends Task
{

    protected $repository;

    public function __construct(PaymentMethodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

