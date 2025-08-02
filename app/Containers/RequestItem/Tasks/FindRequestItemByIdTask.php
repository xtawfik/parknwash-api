<?php

namespace App\Containers\RequestItem\Tasks;

use App\Containers\RequestItem\Data\Repositories\RequestItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindRequestItemByIdTask extends Task
{

    protected $repository;

    public function __construct(RequestItemRepository $repository)
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
