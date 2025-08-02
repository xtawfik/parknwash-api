<?php

namespace App\Containers\ClientOrder\Tasks;

use App\Containers\ClientOrder\Data\Repositories\ClientOrderRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteClientOrderTask extends Task
{

    protected $repository;

    public function __construct(ClientOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
