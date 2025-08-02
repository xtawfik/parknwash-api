<?php

namespace App\Containers\AccDivisionPlace\Tasks;

use App\Containers\AccDivisionPlace\Data\Repositories\AccDivisionPlaceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccDivisionPlacesTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
