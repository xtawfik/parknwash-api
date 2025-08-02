<?php

namespace App\Containers\AccAssetEntry\Tasks;

use App\Containers\AccAssetEntry\Data\Repositories\AccAssetEntryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccAssetEntryTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryRepository $repository)
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
