<?php

namespace App\Containers\AccItemStore\Tasks;

use App\Containers\AccItemStore\Data\Repositories\AccItemStoreRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccItemStoresTask extends Task
{

    protected $repository;

    public function __construct(AccItemStoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
