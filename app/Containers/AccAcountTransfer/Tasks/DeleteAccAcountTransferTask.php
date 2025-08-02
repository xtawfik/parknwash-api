<?php

namespace App\Containers\AccAcountTransfer\Tasks;

use App\Containers\AccAcountTransfer\Data\Repositories\AccAcountTransferRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccAcountTransferTask extends Task
{

    protected $repository;

    public function __construct(AccAcountTransferRepository $repository)
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
