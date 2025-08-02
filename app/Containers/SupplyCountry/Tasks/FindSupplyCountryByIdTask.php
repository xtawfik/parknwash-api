<?php

namespace App\Containers\SupplyCountry\Tasks;

use App\Containers\SupplyCountry\Data\Repositories\SupplyCountryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSupplyCountryByIdTask extends Task
{

    protected $repository;

    public function __construct(SupplyCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
