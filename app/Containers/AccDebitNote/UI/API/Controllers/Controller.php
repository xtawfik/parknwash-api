<?php

namespace App\Containers\AccDebitNote\UI\API\Controllers;

use App\Containers\AccDebitNote\UI\API\Requests\CreateAccDebitNoteRequest;
use App\Containers\AccDebitNote\UI\API\Requests\DeleteAccDebitNoteRequest;
use App\Containers\AccDebitNote\UI\API\Requests\GetAllAccDebitNotesRequest;
use App\Containers\AccDebitNote\UI\API\Requests\FindAccDebitNoteByIdRequest;
use App\Containers\AccDebitNote\UI\API\Requests\UpdateAccDebitNoteRequest;
use App\Containers\AccDebitNote\UI\API\Transformers\AccDebitNoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccDebitNote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccDebitNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccDebitNote(CreateAccDebitNoteRequest $request)
    {
        $accdebitnote = Apiato::call('AccDebitNote@CreateAccDebitNoteAction', [$request]);

        $this->uploadMedia( $accdebitnote, "image", true );
        $this->uploadMedia( $accdebitnote, "gallery" );
        $this->uploadMedia( $accdebitnote, "file" );

        return $this->created($this->transform($accdebitnote, AccDebitNoteTransformer::class));
    }

    /**
     * @param FindAccDebitNoteByIdRequest $request
     * @return array
     */
    public function findAccDebitNoteById(FindAccDebitNoteByIdRequest $request)
    {
        $accdebitnote = Apiato::call('AccDebitNote@FindAccDebitNoteByIdAction', [$request]);

        return $this->transform($accdebitnote, AccDebitNoteTransformer::class);
    }

    /**
     * @param GetAllAccDebitNotesRequest $request
     * @return array
     */
    public function getAllAccDebitNotes(GetAllAccDebitNotesRequest $request)
    {
        $accdebitnotes = Apiato::call('AccDebitNote@GetAllAccDebitNotesAction', [$request]);

        return $this->transform($accdebitnotes, AccDebitNoteTransformer::class);
    }

    /**
     * @param UpdateAccDebitNoteRequest $request
     * @return array
     */
    public function updateAccDebitNote(UpdateAccDebitNoteRequest $request)
    {
        $accdebitnote = Apiato::call('AccDebitNote@UpdateAccDebitNoteAction', [$request]);

        $this->uploadMedia( $accdebitnote, "image", true );
        $this->uploadMedia( $accdebitnote, "gallery" );
        $this->uploadMedia( $accdebitnote, "file" );

        return $this->transform($accdebitnote, AccDebitNoteTransformer::class);
    }

    /**
     * @param DeleteAccDebitNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccDebitNote(DeleteAccDebitNoteRequest $request)
    {
        Apiato::call('AccDebitNote@DeleteAccDebitNoteAction', [$request]);

        return $this->noContent();
    }
}
