<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Option\Data\Repositories\OptionRepository;
use App\Ship\Parents\Tasks\Task;

class OptionReportTask extends Task
{

    protected $repository;

    public function __construct(OptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
