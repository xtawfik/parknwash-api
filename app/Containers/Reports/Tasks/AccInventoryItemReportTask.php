<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccInventoryItem\Data\Repositories\AccInventoryItemRepository;
use App\Ship\Parents\Tasks\Task;

class AccInventoryItemReportTask extends Task
{

    protected $repository;

    public function __construct(AccInventoryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
