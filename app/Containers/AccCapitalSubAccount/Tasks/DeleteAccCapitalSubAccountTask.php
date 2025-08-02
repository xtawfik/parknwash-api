<?php

namespace App\Containers\AccCapitalSubAccount\Tasks;

use App\Containers\AccCapitalSubAccount\Data\Repositories\AccCapitalSubAccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCapitalSubAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalSubAccountRepository $repository)
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
