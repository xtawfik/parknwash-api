<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Attachment\Data\Repositories\AttachmentRepository;
use App\Ship\Parents\Tasks\Task;

class AttachmentReportTask extends Task
{

    protected $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
