<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccAssetEntry\Data\Repositories\AccAssetEntryRepository;
use App\Ship\Parents\Tasks\Task;

class AccAssetEntryReportTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
