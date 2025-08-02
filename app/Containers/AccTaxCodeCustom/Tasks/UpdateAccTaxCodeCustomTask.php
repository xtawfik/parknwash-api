<?php

namespace App\Containers\AccTaxCodeCustom\Tasks;

use App\Containers\AccTaxCodeCustom\Data\Repositories\AccTaxCodeCustomRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccTaxCodeCustomTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeCustomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

