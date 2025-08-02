<?php

namespace App\Containers\AccCreditNote\Tasks;

use App\Containers\AccCreditNote\Data\Repositories\AccCreditNoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCreditNoteTask extends Task
{

    protected $repository;

    public function __construct(AccCreditNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

