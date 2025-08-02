<?php

namespace App\Containers\AccAssetEntry\Tasks;

use App\Containers\AccAssetEntry\Data\Repositories\AccAssetEntryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccAssetEntryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryRepository $repository)
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
