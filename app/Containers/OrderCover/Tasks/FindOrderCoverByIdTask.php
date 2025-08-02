<?php

namespace App\Containers\OrderCover\Tasks;

use App\Containers\OrderCover\Data\Repositories\OrderCoverRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindOrderCoverByIdTask extends Task
{

    protected $repository;

    public function __construct(OrderCoverRepository $repository)
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
