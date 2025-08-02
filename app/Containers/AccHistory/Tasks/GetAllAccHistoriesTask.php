<?php

namespace App\Containers\AccHistory\Tasks;

use App\Containers\AccHistory\Data\Repositories\AccHistoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccHistoriesTask extends Task
{

    protected $repository;

    public function __construct(AccHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
