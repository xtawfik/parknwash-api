<?php

namespace App\Containers\CoverPrice\Tasks;

use App\Containers\CoverPrice\Data\Repositories\CoverPriceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCoverPriceTask extends Task
{

    protected $repository;

    public function __construct(CoverPriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

