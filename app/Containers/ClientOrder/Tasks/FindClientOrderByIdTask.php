<?php

namespace App\Containers\ClientOrder\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindClientOrderByIdTask extends Task
{

    protected $repository;

    public function __construct(ClientOrderRepository $repository)
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
