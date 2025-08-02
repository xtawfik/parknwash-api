<?php

namespace App\Containers\Attachment\Tasks;

use App\Containers\Attachment\Data\Repositories\AttachmentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAttachmentTask extends Task
{

    protected $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

