<?php

namespace App\Containers\AccPlace\Tasks;

use App\Containers\AccPlace\Data\Repositories\AccPlaceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccPlacesTask extends Task
{

    protected $repository;

    public function __construct(AccPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
