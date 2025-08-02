<?php

namespace App\Containers\CustodyCategory\Tasks;

use App\Containers\CustodyCategory\Data\Repositories\CustodyCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCustodyCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(CustodyCategoryRepository $repository)
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
