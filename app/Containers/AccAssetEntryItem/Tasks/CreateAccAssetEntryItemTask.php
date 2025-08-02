<?php

namespace App\Containers\AccAssetEntryItem\Tasks;

use App\Containers\AccAssetEntryItem\Data\Repositories\AccAssetEntryItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccAssetEntryItemTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

