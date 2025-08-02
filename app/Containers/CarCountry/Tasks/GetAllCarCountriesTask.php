<?php

namespace App\Containers\CarCountry\Tasks;

use App\Containers\CarCountry\Data\Repositories\CarModelRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCarCountriesTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
