<?php

namespace App\Containers\AccSpecialAccount\Tasks;

use App\Containers\AccSpecialAccount\Data\Repositories\AccSpecialAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccSpecialAccountTask extends Task
{

    protected $repository;

    public function __construct(AccSpecialAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

