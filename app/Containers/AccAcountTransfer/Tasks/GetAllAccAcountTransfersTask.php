<?php

namespace App\Containers\AccAcountTransfer\Tasks;

use App\Containers\AccAcountTransfer\Data\Repositories\AccAcountTransferRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccAcountTransfersTask extends Task
{

    protected $repository;

    public function __construct(AccAcountTransferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
