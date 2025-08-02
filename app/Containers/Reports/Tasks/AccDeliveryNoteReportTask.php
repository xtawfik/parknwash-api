<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\AccDeliveryNote\Data\Repositories\AccDeliveryNoteRepository;
use App\Ship\Parents\Tasks\Task;

class AccDeliveryNoteReportTask extends Task
{

    protected $repository;

    public function __construct(AccDeliveryNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
