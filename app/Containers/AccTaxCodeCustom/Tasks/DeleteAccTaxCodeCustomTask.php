<?php

namespace App\Containers\AccTaxCodeCustom\Tasks;

use App\Containers\AccTaxCodeCustom\Data\Repositories\AccTaxCodeCustomRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccTaxCodeCustomTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeCustomRepository $repository)
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
