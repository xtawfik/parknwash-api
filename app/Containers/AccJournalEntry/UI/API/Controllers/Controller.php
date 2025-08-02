<?php

namespace App\Containers\AccJournalEntry\UI\API\Controllers;

use App\Containers\AccJournalEntry\UI\API\Requests\CreateAccJournalEntryRequest;
use App\Containers\AccJournalEntry\UI\API\Requests\DeleteAccJournalEntryRequest;
use App\Containers\AccJournalEntry\UI\API\Requests\GetAllAccJournalEntriesRequest;
use App\Containers\AccJournalEntry\UI\API\Requests\FindAccJournalEntryByIdRequest;
use App\Containers\AccJournalEntry\UI\API\Requests\UpdateAccJournalEntryRequest;
use App\Containers\AccJournalEntry\UI\API\Transformers\AccJournalEntryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccJournalEntry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccJournalEntryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccJournalEntry(CreateAccJournalEntryRequest $request)
    {
        $accjournalentry = Apiato::call('AccJournalEntry@CreateAccJournalEntryAction', [$request]);

        $this->uploadMedia( $accjournalentry, "image", true );
        $this->uploadMedia( $accjournalentry, "gallery" );
        $this->uploadMedia( $accjournalentry, "file" );

        return $this->created($this->transform($accjournalentry, AccJournalEntryTransformer::class));
    }

    /**
     * @param FindAccJournalEntryByIdRequest $request
     * @return array
     */
    public function findAccJournalEntryById(FindAccJournalEntryByIdRequest $request)
    {
        $accjournalentry = Apiato::call('AccJournalEntry@FindAccJournalEntryByIdAction', [$request]);

        return $this->transform($accjournalentry, AccJournalEntryTransformer::class);
    }

    /**
     * @param GetAllAccJournalEntriesRequest $request
     * @return array
     */
    public function getAllAccJournalEntries(GetAllAccJournalEntriesRequest $request)
    {
        $accjournalentries = Apiato::call('AccJournalEntry@GetAllAccJournalEntriesAction', [$request]);

        return $this->transform($accjournalentries, AccJournalEntryTransformer::class);
    }

    /**
     * @param UpdateAccJournalEntryRequest $request
     * @return array
     */
    public function updateAccJournalEntry(UpdateAccJournalEntryRequest $request)
    {
        $accjournalentry = Apiato::call('AccJournalEntry@UpdateAccJournalEntryAction', [$request]);

        $this->uploadMedia( $accjournalentry, "image", true );
        $this->uploadMedia( $accjournalentry, "gallery" );
        $this->uploadMedia( $accjournalentry, "file" );

        return $this->transform($accjournalentry, AccJournalEntryTransformer::class);
    }

    /**
     * @param DeleteAccJournalEntryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccJournalEntry(DeleteAccJournalEntryRequest $request)
    {
        Apiato::call('AccJournalEntry@DeleteAccJournalEntryAction', [$request]);

        return $this->noContent();
    }
}
