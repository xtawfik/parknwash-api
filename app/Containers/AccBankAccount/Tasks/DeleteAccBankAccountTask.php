<?php

namespace App\Containers\AccBankAccount\Tasks;

use App\Containers\AccBankAccount\Data\Repositories\AccBankAccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBankAccountTask extends Task
{

    protected $repository;

    public function __construct(AccBankAccountRepository $repository)
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
