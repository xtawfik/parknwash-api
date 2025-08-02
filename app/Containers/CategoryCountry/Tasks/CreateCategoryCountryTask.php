<?php

namespace App\Containers\CategoryCountry\Tasks;

use App\Containers\CategoryCountry\Data\Repositories\CategoryCountryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCategoryCountryTask extends Task
{

    protected $repository;

    public function __construct(CategoryCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

