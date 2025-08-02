<?php

namespace App\Containers\Attendees\Tasks;

use App\Containers\Attendees\Data\Repositories\AttendeesRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAttendeesTask extends Task
{

    protected $repository;

    public function __construct(AttendeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
