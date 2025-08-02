<?php

namespace App\Containers\CustodyCategory\Tasks;

use App\Containers\CustodyCategory\Data\Repositories\CustodyCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustodyCategoryTask extends Task
{

    protected $repository;

    public function __construct(CustodyCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

