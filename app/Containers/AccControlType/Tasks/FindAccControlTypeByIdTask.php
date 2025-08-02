<?php

namespace App\Containers\AccControlType\Tasks;

use App\Containers\AccControlType\Data\Repositories\AccControlTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccControlTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(AccControlTypeRepository $repository)
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
