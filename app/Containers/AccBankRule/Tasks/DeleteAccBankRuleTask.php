<?php

namespace App\Containers\AccBankRule\Tasks;

use App\Containers\AccBankRule\Data\Repositories\AccBankRuleRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBankRuleTask extends Task
{

    protected $repository;

    public function __construct(AccBankRuleRepository $repository)
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
