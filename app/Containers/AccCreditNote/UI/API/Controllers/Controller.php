<?php

namespace App\Containers\AccCreditNote\UI\API\Controllers;

use App\Containers\AccCreditNote\UI\API\Requests\CreateAccCreditNoteRequest;
use App\Containers\AccCreditNote\UI\API\Requests\DeleteAccCreditNoteRequest;
use App\Containers\AccCreditNote\UI\API\Requests\GetAllAccCreditNotesRequest;
use App\Containers\AccCreditNote\UI\API\Requests\FindAccCreditNoteByIdRequest;
use App\Containers\AccCreditNote\UI\API\Requests\UpdateAccCreditNoteRequest;
use App\Containers\AccCreditNote\UI\API\Transformers\AccCreditNoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCreditNote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCreditNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCreditNote(CreateAccCreditNoteRequest $request)
    {
        $acccreditnote = Apiato::call('AccCreditNote@CreateAccCreditNoteAction', [$request]);

        $this->uploadMedia( $acccreditnote, "image", true );
        $this->uploadMedia( $acccreditnote, "gallery" );
        $this->uploadMedia( $acccreditnote, "file" );

        return $this->created($this->transform($acccreditnote, AccCreditNoteTransformer::class));
    }

    /**
     * @param FindAccCreditNoteByIdRequest $request
     * @return array
     */
    public function findAccCreditNoteById(FindAccCreditNoteByIdRequest $request)
    {
        $acccreditnote = Apiato::call('AccCreditNote@FindAccCreditNoteByIdAction', [$request]);

        return $this->transform($acccreditnote, AccCreditNoteTransformer::class);
    }

    /**
     * @param GetAllAccCreditNotesRequest $request
     * @return array
     */
    public function getAllAccCreditNotes(GetAllAccCreditNotesRequest $request)
    {
        $acccreditnotes = Apiato::call('AccCreditNote@GetAllAccCreditNotesAction', [$request]);

        return $this->transform($acccreditnotes, AccCreditNoteTransformer::class);
    }

    /**
     * @param UpdateAccCreditNoteRequest $request
     * @return array
     */
    public function updateAccCreditNote(UpdateAccCreditNoteRequest $request)
    {
        $acccreditnote = Apiato::call('AccCreditNote@UpdateAccCreditNoteAction', [$request]);

        $this->uploadMedia( $acccreditnote, "image", true );
        $this->uploadMedia( $acccreditnote, "gallery" );
        $this->uploadMedia( $acccreditnote, "file" );

        return $this->transform($acccreditnote, AccCreditNoteTransformer::class);
    }

    /**
     * @param DeleteAccCreditNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCreditNote(DeleteAccCreditNoteRequest $request)
    {
        Apiato::call('AccCreditNote@DeleteAccCreditNoteAction', [$request]);

        return $this->noContent();
    }
}
