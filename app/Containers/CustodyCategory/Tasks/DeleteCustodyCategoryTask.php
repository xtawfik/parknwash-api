<?php

namespace App\Containers\CustodyCategory\Tasks;

use App\Containers\CustodyCategory\Data\Repositories\CustodyCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCustodyCategoryTask extends Task
{

    protected $repository;

    public function __construct(CustodyCategoryRepository $repository)
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
