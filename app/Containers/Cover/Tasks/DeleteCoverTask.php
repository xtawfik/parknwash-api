<?php

namespace App\Containers\Cover\Tasks;

use App\Containers\Cover\Data\Repositories\CoverRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCoverTask extends Task
{

    protected $repository;

    public function __construct(CoverRepository $repository)
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
