<?php

namespace App\Containers\OptionCategory\Tasks;

use App\Containers\OptionCategory\Data\Repositories\OptionCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOptionCategoryTask extends Task
{

    protected $repository;

    public function __construct(OptionCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

