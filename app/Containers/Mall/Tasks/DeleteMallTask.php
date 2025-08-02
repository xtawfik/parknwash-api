<?php

namespace App\Containers\Mall\Tasks;

use App\Containers\Mall\Data\Repositories\MallRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteMallTask extends Task
{

    protected $repository;

    public function __construct(MallRepository $repository)
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
