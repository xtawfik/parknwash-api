<?php

namespace App\Containers\PaymentMethod\Tasks;

use App\Containers\PaymentMethod\Data\Repositories\PaymentMethodRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePaymentMethodTask extends Task
{

    protected $repository;

    public function __construct(PaymentMethodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

