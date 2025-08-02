<?php

namespace App\Containers\AccControlAccount\Tasks;

use App\Containers\AccControlAccount\Data\Repositories\AccControlAccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccControlAccountTask extends Task
{

    protected $repository;

    public function __construct(AccControlAccountRepository $repository)
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
