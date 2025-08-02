<?php

namespace App\Containers\CoverPrice\Tasks;

use App\Containers\CoverPrice\Data\Repositories\CoverPriceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCoverPriceTask extends Task
{

    protected $repository;

    public function __construct(CoverPriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

