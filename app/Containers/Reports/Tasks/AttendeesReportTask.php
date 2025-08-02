<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Attendees\Data\Repositories\AttendeesRepository;
use App\Ship\Parents\Tasks\Task;

class AttendeesReportTask extends Task
{

    protected $repository;

    public function __construct(AttendeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
