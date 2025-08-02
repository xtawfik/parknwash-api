<?php

namespace App\Containers\AccCustomer\Tasks;

use App\Containers\AccCustomer\Data\Repositories\AccCustomerRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCustomerTask extends Task
{

    protected $repository;

    public function __construct(AccCustomerRepository $repository)
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
