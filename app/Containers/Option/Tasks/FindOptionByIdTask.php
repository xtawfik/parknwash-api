<?php

namespace App\Containers\Option\Tasks;

use App\Containers\Option\Data\Repositories\OptionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindOptionByIdTask extends Task
{

    protected $repository;

    public function __construct(OptionRepository $repository)
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
