<?php

namespace App\Containers\CustodyData\Tasks;

use App\Containers\CustodyData\Data\Repositories\CustodyDataRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCustodyDataByIdTask extends Task
{

    protected $repository;

    public function __construct(CustodyDataRepository $repository)
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
