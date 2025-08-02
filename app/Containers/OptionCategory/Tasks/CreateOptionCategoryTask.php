<?php

namespace App\Containers\OptionCategory\Tasks;

use App\Containers\OptionCategory\Data\Repositories\OptionCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOptionCategoryTask extends Task
{

    protected $repository;

    public function __construct(OptionCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

