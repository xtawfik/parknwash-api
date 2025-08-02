<?php

namespace App\Containers\Cover\Tasks;

use App\Containers\Cover\Data\Repositories\CoverRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCoverTask extends Task
{

    protected $repository;

    public function __construct(CoverRepository $repository)
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

