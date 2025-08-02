<?php

namespace App\Containers\Cover\Tasks;

use App\Containers\Cover\Data\Repositories\CoverRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCoverByIdTask extends Task
{

    protected $repository;

    public function __construct(CoverRepository $repository)
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
