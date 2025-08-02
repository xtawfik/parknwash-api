<?php

namespace App\Containers\Country\Tasks;

use App\Containers\Country\Data\Repositories\CountryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCountryTask extends Task
{

    protected $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

