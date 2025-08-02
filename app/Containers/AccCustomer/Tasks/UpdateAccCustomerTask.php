<?php

namespace App\Containers\AccCustomer\Tasks;

use App\Containers\AccCustomer\Data\Repositories\AccCustomerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCustomerTask extends Task
{

    protected $repository;

    public function __construct(AccCustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

