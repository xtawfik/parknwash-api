<?php

namespace App\Containers\SupplyCountry\Tasks;

use App\Containers\SupplyCountry\Data\Repositories\SupplyCountryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSupplyCountryTask extends Task
{

    protected $repository;

    public function __construct(SupplyCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

