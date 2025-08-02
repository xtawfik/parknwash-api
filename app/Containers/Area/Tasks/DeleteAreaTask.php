<?php

namespace App\Containers\Area\Tasks;

use App\Containers\Area\Data\Repositories\AreaRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAreaTask extends Task
{

    protected $repository;

    public function __construct(AreaRepository $repository)
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
