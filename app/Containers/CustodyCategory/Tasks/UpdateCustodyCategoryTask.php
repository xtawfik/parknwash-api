<?php

namespace App\Containers\CustodyCategory\Tasks;

use App\Containers\CustodyCategory\Data\Repositories\CustodyCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustodyCategoryTask extends Task
{

    protected $repository;

    public function __construct(CustodyCategoryRepository $repository)
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

