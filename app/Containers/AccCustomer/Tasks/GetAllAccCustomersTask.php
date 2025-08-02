<?php

namespace App\Containers\AccCustomer\Tasks;

use App\Containers\AccCustomer\Data\Repositories\AccCustomerRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCustomersTask extends Task
{

    protected $repository;

    public function __construct(AccCustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
