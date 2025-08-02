<?php

namespace App\Containers\AccCustomer\Tasks;

use App\Containers\AccCustomer\Data\Repositories\AccCustomerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCustomerTask extends Task
{

    protected $repository;

    public function __construct(AccCustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

