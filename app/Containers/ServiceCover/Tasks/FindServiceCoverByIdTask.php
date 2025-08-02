<?php

namespace App\Containers\ServiceCover\Tasks;

use App\Containers\ServiceCover\Data\Repositories\ServiceCoverRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindServiceCoverByIdTask extends Task
{

    protected $repository;

    public function __construct(ServiceCoverRepository $repository)
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
