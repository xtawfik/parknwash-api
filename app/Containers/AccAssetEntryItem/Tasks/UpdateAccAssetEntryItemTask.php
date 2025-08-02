<?php

namespace App\Containers\AccAssetEntryItem\Tasks;

use App\Containers\AccAssetEntryItem\Data\Repositories\AccAssetEntryItemRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccAssetEntryItemTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

