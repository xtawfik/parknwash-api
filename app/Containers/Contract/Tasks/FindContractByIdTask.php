<?php

namespace App\Containers\Contract\Tasks;

use App\Containers\Contract\Data\Repositories\ContractRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindContractByIdTask extends Task
{

    protected $repository;

    public function __construct(ContractRepository $repository)
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
