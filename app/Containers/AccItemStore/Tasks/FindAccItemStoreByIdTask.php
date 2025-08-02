<?php

namespace App\Containers\AccItemStore\Tasks;

use App\Containers\AccItemStore\Data\Repositories\AccItemStoreRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccItemStoreByIdTask extends Task
{

    protected $repository;

    public function __construct(AccItemStoreRepository $repository)
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
