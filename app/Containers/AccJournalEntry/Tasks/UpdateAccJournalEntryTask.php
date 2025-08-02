<?php

namespace App\Containers\AccJournalEntry\Tasks;

use App\Containers\AccJournalEntry\Data\Repositories\AccJournalEntryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccJournalEntryTask extends Task
{

    protected $repository;

    public function __construct(AccJournalEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

