<?php

namespace App\Containers\SupplyCountry\Tasks;

use App\Containers\SupplyCountry\Data\Repositories\SupplyCountryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSupplyCountriesTask extends Task
{

    protected $repository;

    public function __construct(SupplyCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
