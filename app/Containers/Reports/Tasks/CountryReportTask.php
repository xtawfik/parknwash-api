<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Country\Data\Repositories\CountryRepository;
use App\Ship\Parents\Tasks\Task;

class CountryReportTask extends Task
{

    protected $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
