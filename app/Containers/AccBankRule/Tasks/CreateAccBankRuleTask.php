<?php

namespace App\Containers\AccBankRule\Tasks;

use App\Containers\AccBankRule\Data\Repositories\AccBankRuleRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccBankRuleTask extends Task
{

    protected $repository;

    public function __construct(AccBankRuleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

