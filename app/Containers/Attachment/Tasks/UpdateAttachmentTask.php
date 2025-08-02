<?php

namespace App\Containers\Attachment\Tasks;

use App\Containers\Attachment\Data\Repositories\AttachmentRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAttachmentTask extends Task
{

    protected $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

