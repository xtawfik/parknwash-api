<?php

namespace App\Containers\AccJournalEntry\Tasks;

use App\Containers\AccJournalEntry\Data\Repositories\AccJournalEntryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccJournalEntryTask extends Task
{

    protected $repository;

    public function __construct(AccJournalEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

