<?php

namespace App\Containers\AccLatePayment\Tasks;

use App\Containers\AccLatePayment\Data\Repositories\AccLatePaymentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccLatePaymentTask extends Task
{

    protected $repository;

    public function __construct(AccLatePaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
