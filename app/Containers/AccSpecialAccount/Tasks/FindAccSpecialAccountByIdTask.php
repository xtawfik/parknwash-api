<?php

namespace App\Containers\AccSpecialAccount\Tasks;

use App\Containers\AccSpecialAccount\Data\Repositories\AccSpecialAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccSpecialAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccSpecialAccountRepository $repository)
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
