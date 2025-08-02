<?php

namespace App\Containers\AccFooter\Tasks;

use App\Containers\AccFooter\Data\Repositories\AccFooterRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccFooterTask extends Task
{

    protected $repository;

    public function __construct(AccFooterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

