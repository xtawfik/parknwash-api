<?php

namespace App\Containers\AccTaxCodeCustom\Tasks;

use App\Containers\AccTaxCodeCustom\Data\Repositories\AccTaxCodeCustomRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccTaxCodeCustomTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeCustomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

