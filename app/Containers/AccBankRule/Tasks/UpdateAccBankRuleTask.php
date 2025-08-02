<?php

namespace App\Containers\AccBankRule\Tasks;

use App\Containers\AccBankRule\Data\Repositories\AccBankRuleRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccBankRuleTask extends Task
{

    protected $repository;

    public function __construct(AccBankRuleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

