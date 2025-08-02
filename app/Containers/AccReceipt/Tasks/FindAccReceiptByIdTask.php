<?php

namespace App\Containers\AccReceipt\Tasks;

use App\Containers\AccReceipt\Data\Repositories\AccReceiptRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccReceiptByIdTask extends Task
{

    protected $repository;

    public function __construct(AccReceiptRepository $repository)
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
