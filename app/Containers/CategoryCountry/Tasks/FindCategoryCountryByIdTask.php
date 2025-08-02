<?php

namespace App\Containers\CategoryCountry\Tasks;

use App\Containers\CategoryCountry\Data\Repositories\CategoryCountryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCategoryCountryByIdTask extends Task
{

    protected $repository;

    public function __construct(CategoryCountryRepository $repository)
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
