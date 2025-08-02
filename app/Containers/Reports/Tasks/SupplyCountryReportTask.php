<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\SupplyCountry\Data\Repositories\SupplyCountryRepository;
use App\Ship\Parents\Tasks\Task;

class SupplyCountryReportTask extends Task
{

    protected $repository;

    public function __construct(SupplyCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
