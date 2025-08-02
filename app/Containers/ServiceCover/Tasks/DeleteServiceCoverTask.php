<?php

namespace App\Containers\ServiceCover\Tasks;

use App\Containers\ServiceCover\Data\Repositories\ServiceCoverRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteServiceCoverTask extends Task
{

    protected $repository;

    public function __construct(ServiceCoverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
