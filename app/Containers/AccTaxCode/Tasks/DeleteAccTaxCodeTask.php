<?php

namespace App\Containers\AccTaxCode\Tasks;

use App\Containers\AccTaxCode\Data\Repositories\AccTaxCodeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccTaxCodeTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeRepository $repository)
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
