<?php

namespace App\Containers\AccPayment\Tasks;

use App\Containers\AccPayment\Data\Repositories\AccPaymentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccPaymentTask extends Task
{

    protected $repository;

    public function __construct(AccPaymentRepository $repository)
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
