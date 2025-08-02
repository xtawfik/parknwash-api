<?php

namespace App\Containers\AccDebitNote\Tasks;

use App\Containers\AccDebitNote\Data\Repositories\AccDebitNoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccDebitNoteByIdTask extends Task
{

    protected $repository;

    public function __construct(AccDebitNoteRepository $repository)
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
