<?php

namespace App\Containers\AccTaxCodeCustom\Tasks;

use App\Containers\AccTaxCodeCustom\Data\Repositories\AccTaxCodeCustomRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccTaxCodeCustomsTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeCustomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
