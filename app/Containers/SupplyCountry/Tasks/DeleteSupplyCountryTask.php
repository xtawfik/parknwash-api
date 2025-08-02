<?php

namespace App\Containers\SupplyCountry\Tasks;

use App\Containers\SupplyCountry\Data\Repositories\SupplyCountryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSupplyCountryTask extends Task
{

    protected $repository;

    public function __construct(SupplyCountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
