<?php

namespace App\Containers\AccFooter\Tasks;

use App\Containers\AccFooter\Data\Repositories\AccFooterRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccFooterTask extends Task
{

    protected $repository;

    public function __construct(AccFooterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

