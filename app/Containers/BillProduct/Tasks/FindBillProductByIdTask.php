<?php

namespace App\Containers\BillProduct\Tasks;

use App\Containers\BillProduct\Data\Repositories\BillProductRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindBillProductByIdTask extends Task
{

    protected $repository;

    public function __construct(BillProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
