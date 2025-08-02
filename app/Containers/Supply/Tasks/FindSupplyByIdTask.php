<?php

namespace App\Containers\Supply\Tasks;

use App\Containers\Supply\Data\Repositories\SupplyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSupplyByIdTask extends Task
{

    protected $repository;

    public function __construct(SupplyRepository $repository)
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
