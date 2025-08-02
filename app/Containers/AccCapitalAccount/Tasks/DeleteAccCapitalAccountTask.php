<?php

namespace App\Containers\AccCapitalAccount\Tasks;

use App\Containers\AccCapitalAccount\Data\Repositories\AccCapitalAccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCapitalAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalAccountRepository $repository)
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
