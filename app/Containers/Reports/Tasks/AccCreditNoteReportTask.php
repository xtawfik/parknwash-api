<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccCreditNote\Data\Repositories\AccCreditNoteRepository;
use App\Ship\Parents\Tasks\Task;

class AccCreditNoteReportTask extends Task
{

    protected $repository;

    public function __construct(AccCreditNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
