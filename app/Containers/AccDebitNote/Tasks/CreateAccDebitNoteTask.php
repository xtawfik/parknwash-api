<?php

namespace App\Containers\AccDebitNote\Tasks;

use App\Containers\AccDebitNote\Data\Repositories\AccDebitNoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccDebitNoteTask extends Task
{

    protected $repository;

    public function __construct(AccDebitNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

