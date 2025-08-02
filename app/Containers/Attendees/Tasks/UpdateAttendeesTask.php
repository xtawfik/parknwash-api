<?php

namespace App\Containers\Attendees\Tasks;

use App\Containers\Attendees\Data\Repositories\AttendeesRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAttendeesTask extends Task
{

    protected $repository;

    public function __construct(AttendeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

