<?php

namespace App\Containers\AccHistory\UI\API\Controllers;

use App\Containers\AccHistory\UI\API\Requests\CreateAccHistoryRequest;
use App\Containers\AccHistory\UI\API\Requests\DeleteAccHistoryRequest;
use App\Containers\AccHistory\UI\API\Requests\GetAllAccHistoriesRequest;
use App\Containers\AccHistory\UI\API\Requests\FindAccHistoryByIdRequest;
use App\Containers\AccHistory\UI\API\Requests\UpdateAccHistoryRequest;
use App\Containers\AccHistory\UI\API\Transformers\AccHistoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccHistory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccHistoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccHistory(CreateAccHistoryRequest $request)
    {
        $acchistory = Apiato::call('AccHistory@CreateAccHistoryAction', [$request]);

        $this->uploadMedia( $acchistory, "image", true );
        $this->uploadMedia( $acchistory, "gallery" );
        $this->uploadMedia( $acchistory, "file" );

        return $this->created($this->transform($acchistory, AccHistoryTransformer::class));
    }

    /**
     * @param FindAccHistoryByIdRequest $request
     * @return array
     */
    public function findAccHistoryById(FindAccHistoryByIdRequest $request)
    {
        $acchistory = Apiato::call('AccHistory@FindAccHistoryByIdAction', [$request]);

        return $this->transform($acchistory, AccHistoryTransformer::class);
    }

    /**
     * @param GetAllAccHistoriesRequest $request
     * @return array
     */
    public function getAllAccHistories(GetAllAccHistoriesRequest $request)
    {
        $acchistories = Apiato::call('AccHistory@GetAllAccHistoriesAction', [$request]);

        return $this->transform($acchistories, AccHistoryTransformer::class);
    }

    /**
     * @param UpdateAccHistoryRequest $request
     * @return array
     */
    public function updateAccHistory(UpdateAccHistoryRequest $request)
    {
        $acchistory = Apiato::call('AccHistory@UpdateAccHistoryAction', [$request]);

        $this->uploadMedia( $acchistory, "image", true );
        $this->uploadMedia( $acchistory, "gallery" );
        $this->uploadMedia( $acchistory, "file" );

        return $this->transform($acchistory, AccHistoryTransformer::class);
    }

    /**
     * @param DeleteAccHistoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccHistory(DeleteAccHistoryRequest $request)
    {
        Apiato::call('AccHistory@DeleteAccHistoryAction', [$request]);

        return $this->noContent();
    }
}
