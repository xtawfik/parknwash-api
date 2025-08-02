<?php

namespace App\Containers\AccAcountTransfer\Tasks;

use App\Containers\AccAcountTransfer\Data\Repositories\AccAcountTransferRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccAcountTransferTask extends Task
{

    protected $repository;

    public function __construct(AccAcountTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

