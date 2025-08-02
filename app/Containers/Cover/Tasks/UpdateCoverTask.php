<?php

namespace App\Containers\Cover\Tasks;

use App\Containers\Cover\Data\Repositories\CoverRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCoverTask extends Task
{

    protected $repository;

    public function __construct(CoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

