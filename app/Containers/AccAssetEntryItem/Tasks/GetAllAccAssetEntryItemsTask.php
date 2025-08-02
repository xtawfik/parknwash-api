<?php

namespace App\Containers\AccAssetEntryItem\Tasks;

use App\Containers\AccAssetEntryItem\Data\Repositories\AccAssetEntryItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccAssetEntryItemsTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
