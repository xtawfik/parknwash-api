<?php

namespace App\Containers\Partner\Tasks;

use App\Containers\Partner\Data\Repositories\PartnerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePartnerTask extends Task
{

    protected $repository;

    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

