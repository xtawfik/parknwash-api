<?php

namespace App\Containers\ClientOrder\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateClientOrderTask extends Task
{

    protected $repository;

    public function __construct(ClientOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

