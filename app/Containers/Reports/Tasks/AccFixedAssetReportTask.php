<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccFixedAsset\Data\Repositories\AccFixedAssetRepository;
use App\Ship\Parents\Tasks\Task;

class AccFixedAssetReportTask extends Task
{

    protected $repository;

    public function __construct(AccFixedAssetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
