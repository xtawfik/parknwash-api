<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Parents\Tasks\Task;

class ClientOrderReportTask extends Task
{

    protected $repository;

    public function __construct(ClientOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
