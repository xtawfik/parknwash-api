<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AssetCategory\Data\Repositories\AssetCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class AssetCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(AssetCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
