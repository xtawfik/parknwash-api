<?php

namespace App\Containers\AccReceipt\Tasks;

use App\Containers\AccReceipt\Data\Repositories\AccReceiptRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccReceiptTask extends Task
{

    protected $repository;

    public function __construct(AccReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

