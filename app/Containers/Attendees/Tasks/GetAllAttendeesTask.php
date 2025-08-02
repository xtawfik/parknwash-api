<?php

namespace App\Containers\Attendees\Tasks;

use App\Containers\Attendees\Data\Repositories\AttendeesRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAttendeesTask extends Task
{

    protected $repository;

    public function __construct(AttendeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
