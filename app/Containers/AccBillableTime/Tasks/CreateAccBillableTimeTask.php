<?php

namespace App\Containers\AccBillableTime\Tasks;

use App\Containers\AccBillableTime\Data\Repositories\AccBillableTimeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccBillableTimeTask extends Task
{

    protected $repository;

    public function __construct(AccBillableTimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

