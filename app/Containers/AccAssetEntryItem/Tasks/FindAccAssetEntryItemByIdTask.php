<?php

namespace App\Containers\AccAssetEntryItem\Tasks;

use App\Containers\AccAssetEntryItem\Data\Repositories\AccAssetEntryItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccAssetEntryItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryItemRepository $repository)
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
