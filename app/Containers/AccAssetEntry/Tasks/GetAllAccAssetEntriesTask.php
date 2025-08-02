<?php

namespace App\Containers\AccAssetEntry\Tasks;

use App\Containers\AccAssetEntry\Data\Repositories\AccAssetEntryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccAssetEntriesTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
