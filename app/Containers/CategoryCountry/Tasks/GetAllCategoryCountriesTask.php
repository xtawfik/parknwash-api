<?php

namespace App\Containers\CategoryCountry\Tasks;

use App\Containers\CategoryCountry\Data\Repositories\CategoryCountryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoryCountriesTask extends Task
{

    protected $repository;

    public function __construct(CategoryCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
