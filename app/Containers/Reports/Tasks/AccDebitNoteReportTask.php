<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccDebitNote\Data\Repositories\AccDebitNoteRepository;
use App\Ship\Parents\Tasks\Task;

class AccDebitNoteReportTask extends Task
{

    protected $repository;

    public function __construct(AccDebitNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
