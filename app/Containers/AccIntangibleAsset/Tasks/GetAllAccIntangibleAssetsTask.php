<?php

namespace App\Containers\AccIntangibleAsset\Tasks;

use App\Containers\AccIntangibleAsset\Data\Repositories\AccIntangibleAssetRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccIntangibleAssetsTask extends Task
{

    protected $repository;

    public function __construct(AccIntangibleAssetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
