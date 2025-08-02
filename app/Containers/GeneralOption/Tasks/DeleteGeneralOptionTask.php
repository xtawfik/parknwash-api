<?php

namespace App\Containers\GeneralOption\Tasks;

use App\Containers\GeneralOption\Data\Repositories\GeneralOptionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteGeneralOptionTask extends Task
{

    protected $repository;

    public function __construct(GeneralOptionRepository $repository)
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
