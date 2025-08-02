<?php

namespace App\Containers\AccTaxCode\Tasks;

use App\Containers\AccTaxCode\Data\Repositories\AccTaxCodeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccTaxCodeTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

