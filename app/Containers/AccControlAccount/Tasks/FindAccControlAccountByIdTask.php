<?php

namespace App\Containers\AccControlAccount\Tasks;

use App\Containers\AccControlAccount\Data\Repositories\AccControlAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccControlAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccControlAccountRepository $repository)
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
