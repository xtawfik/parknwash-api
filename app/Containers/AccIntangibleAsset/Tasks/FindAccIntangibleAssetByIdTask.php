<?php

namespace App\Containers\AccIntangibleAsset\Tasks;

use App\Containers\AccIntangibleAsset\Data\Repositories\AccIntangibleAssetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccIntangibleAssetByIdTask extends Task
{

    protected $repository;

    public function __construct(AccIntangibleAssetRepository $repository)
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
