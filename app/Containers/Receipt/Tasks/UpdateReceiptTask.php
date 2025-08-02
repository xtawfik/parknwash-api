<?php

namespace App\Containers\Receipt\Tasks;

use App\Containers\Receipt\Data\Repositories\ReceiptRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateReceiptTask extends Task
{

    protected $repository;

    public function __construct(ReceiptRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

