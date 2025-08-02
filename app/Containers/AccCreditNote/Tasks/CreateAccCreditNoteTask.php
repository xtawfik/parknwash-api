<?php

namespace App\Containers\AccCreditNote\Tasks;

use App\Containers\AccCreditNote\Data\Repositories\AccCreditNoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCreditNoteTask extends Task
{

    protected $repository;

    public function __construct(AccCreditNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

