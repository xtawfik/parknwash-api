<?php

namespace App\Containers\AccItem\Tasks;

use App\Containers\AccItem\Data\Repositories\AccItemRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccItemByIdTask extends Task
{

    protected $repository;

    public function __construct(AccItemRepository $repository)
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
