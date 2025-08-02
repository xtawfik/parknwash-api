<?php

namespace App\Containers\AccTaxCode\Tasks;

use App\Containers\AccTaxCode\Data\Repositories\AccTaxCodeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccTaxCodesTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
