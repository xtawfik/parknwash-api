<?php

namespace App\Containers\AccBankAccount\Tasks;

use App\Containers\AccBankAccount\Data\Repositories\AccBankAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccBankAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccBankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
