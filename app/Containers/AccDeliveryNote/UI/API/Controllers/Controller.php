<?php

namespace App\Containers\AccDeliveryNote\UI\API\Controllers;

use App\Containers\AccDeliveryNote\UI\API\Requests\CreateAccDeliveryNoteRequest;
use App\Containers\AccDeliveryNote\UI\API\Requests\DeleteAccDeliveryNoteRequest;
use App\Containers\AccDeliveryNote\UI\API\Requests\GetAllAccDeliveryNotesRequest;
use App\Containers\AccDeliveryNote\UI\API\Requests\FindAccDeliveryNoteByIdRequest;
use App\Containers\AccDeliveryNote\UI\API\Requests\UpdateAccDeliveryNoteRequest;
use App\Containers\AccDeliveryNote\UI\API\Transformers\AccDeliveryNoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccDeliveryNote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccDeliveryNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccDeliveryNote(CreateAccDeliveryNoteRequest $request)
    {
        $accdeliverynote = Apiato::call('AccDeliveryNote@CreateAccDeliveryNoteAction', [$request]);

        $this->uploadMedia( $accdeliverynote, "image", true );
        $this->uploadMedia( $accdeliverynote, "gallery" );
        $this->uploadMedia( $accdeliverynote, "file" );

        return $this->created($this->transform($accdeliverynote, AccDeliveryNoteTransformer::class));
    }

    /**
     * @param FindAccDeliveryNoteByIdRequest $request
     * @return array
     */
    public function findAccDeliveryNoteById(FindAccDeliveryNoteByIdRequest $request)
    {
        $accdeliverynote = Apiato::call('AccDeliveryNote@FindAccDeliveryNoteByIdAction', [$request]);

        return $this->transform($accdeliverynote, AccDeliveryNoteTransformer::class);
    }

    /**
     * @param GetAllAccDeliveryNotesRequest $request
     * @return array
     */
    public function getAllAccDeliveryNotes(GetAllAccDeliveryNotesRequest $request)
    {
        $accdeliverynotes = Apiato::call('AccDeliveryNote@GetAllAccDeliveryNotesAction', [$request]);

        return $this->transform($accdeliverynotes, AccDeliveryNoteTransformer::class);
    }

    /**
     * @param UpdateAccDeliveryNoteRequest $request
     * @return array
     */
    public function updateAccDeliveryNote(UpdateAccDeliveryNoteRequest $request)
    {
        $accdeliverynote = Apiato::call('AccDeliveryNote@UpdateAccDeliveryNoteAction', [$request]);

        $this->uploadMedia( $accdeliverynote, "image", true );
        $this->uploadMedia( $accdeliverynote, "gallery" );
        $this->uploadMedia( $accdeliverynote, "file" );

        return $this->transform($accdeliverynote, AccDeliveryNoteTransformer::class);
    }

    /**
     * @param DeleteAccDeliveryNoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccDeliveryNote(DeleteAccDeliveryNoteRequest $request)
    {
        Apiato::call('AccDeliveryNote@DeleteAccDeliveryNoteAction', [$request]);

        return $this->noContent();
    }
}
