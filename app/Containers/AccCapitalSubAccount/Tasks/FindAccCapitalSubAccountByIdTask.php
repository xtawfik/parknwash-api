<?php

namespace App\Containers\AccCapitalSubAccount\Tasks;

use App\Containers\AccCapitalSubAccount\Data\Repositories\AccCapitalSubAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCapitalSubAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalSubAccountRepository $repository)
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
