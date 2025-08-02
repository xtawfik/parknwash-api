<?php

namespace App\Containers\AccBankRule\Tasks;

use App\Containers\AccBankRule\Data\Repositories\AccBankRuleRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccBankRuleByIdTask extends Task
{

    protected $repository;

    public function __construct(AccBankRuleRepository $repository)
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
