<?php

namespace App\Containers\PaymentMethod\Tasks;

use App\Containers\PaymentMethod\Data\Repositories\PaymentMethodRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPaymentMethodByIdTask extends Task
{

    protected $repository;

    public function __construct(PaymentMethodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
