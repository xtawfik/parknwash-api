<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\OptionCategory\Data\Repositories\OptionCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class OptionCategoryReportTask extends Task
{

    protected $repository;

    public function __construct(OptionCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
