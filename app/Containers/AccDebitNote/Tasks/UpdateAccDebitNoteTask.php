<?php

namespace App\Containers\AccDebitNote\Tasks;

use App\Containers\AccDebitNote\Data\Repositories\AccDebitNoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccDebitNoteTask extends Task
{

    protected $repository;

    public function __construct(AccDebitNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

