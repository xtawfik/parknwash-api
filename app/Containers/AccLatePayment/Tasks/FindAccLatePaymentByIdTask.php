<?php

namespace App\Containers\AccLatePayment\Tasks;

use App\Containers\AccLatePayment\Data\Repositories\AccLatePaymentRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccLatePaymentByIdTask extends Task
{

    protected $repository;

    public function __construct(AccLatePaymentRepository $repository)
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
