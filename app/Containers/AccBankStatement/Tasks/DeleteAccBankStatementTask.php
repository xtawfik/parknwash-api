<?php

namespace App\Containers\AccBankStatement\Tasks;

use App\Containers\AccBankStatement\Data\Repositories\AccBankStatementRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBankStatementTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatementRepository $repository)
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
