<?php

namespace App\Containers\AccCustomer\Tasks;

use App\Containers\AccCustomer\Data\Repositories\AccCustomerRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCustomerByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCustomerRepository $repository)
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
