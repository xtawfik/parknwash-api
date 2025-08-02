<?php

namespace App\Containers\AccBillableTime\Tasks;

use App\Containers\AccBillableTime\Data\Repositories\AccBillableTimeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBillableTimeTask extends Task
{

    protected $repository;

    public function __construct(AccBillableTimeRepository $repository)
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
