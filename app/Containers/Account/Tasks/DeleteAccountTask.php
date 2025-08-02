<?php

namespace App\Containers\Account\Tasks;

use App\Containers\Account\Data\Repositories\AccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccountTask extends Task
{

    protected $repository;

    public function __construct(AccountRepository $repository)
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
