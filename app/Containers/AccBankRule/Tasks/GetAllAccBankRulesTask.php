<?php

namespace App\Containers\AccBankRule\Tasks;

use App\Containers\AccBankRule\Data\Repositories\AccBankRuleRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccBankRulesTask extends Task
{

    protected $repository;

    public function __construct(AccBankRuleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
