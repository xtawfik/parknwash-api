<?php

namespace App\Containers\AccTaxCode\Tasks;

use App\Containers\AccTaxCode\Data\Repositories\AccTaxCodeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccTaxCodeTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

