<?php

namespace App\Containers\AccCurrencyRevaluationaItem\UI\API\Controllers;

use App\Containers\AccCurrencyRevaluationaItem\UI\API\Requests\CreateAccCurrencyRevaluationaItemRequest;
use App\Containers\AccCurrencyRevaluationaItem\UI\API\Requests\DeleteAccCurrencyRevaluationaItemRequest;
use App\Containers\AccCurrencyRevaluationaItem\UI\API\Requests\GetAllAccCurrencyRevaluationaItemsRequest;
use App\Containers\AccCurrencyRevaluationaItem\UI\API\Requests\FindAccCurrencyRevaluationaItemByIdRequest;
use App\Containers\AccCurrencyRevaluationaItem\UI\API\Requests\UpdateAccCurrencyRevaluationaItemRequest;
use App\Containers\AccCurrencyRevaluationaItem\UI\API\Transformers\AccCurrencyRevaluationaItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrencyRevaluationaItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyRevaluationaItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrencyRevaluationaItem(CreateAccCurrencyRevaluationaItemRequest $request)
    {
        $acccurrencyrevaluationaitem = Apiato::call('AccCurrencyRevaluationaItem@CreateAccCurrencyRevaluationaItemAction', [$request]);

        $this->uploadMedia( $acccurrencyrevaluationaitem, "image", true );
        $this->uploadMedia( $acccurrencyrevaluationaitem, "gallery" );
        $this->uploadMedia( $acccurrencyrevaluationaitem, "file" );

        return $this->created($this->transform($acccurrencyrevaluationaitem, AccCurrencyRevaluationaItemTransformer::class));
    }

    /**
     * @param FindAccCurrencyRevaluationaItemByIdRequest $request
     * @return array
     */
    public function findAccCurrencyRevaluationaItemById(FindAccCurrencyRevaluationaItemByIdRequest $request)
    {
        $acccurrencyrevaluationaitem = Apiato::call('AccCurrencyRevaluationaItem@FindAccCurrencyRevaluationaItemByIdAction', [$request]);

        return $this->transform($acccurrencyrevaluationaitem, AccCurrencyRevaluationaItemTransformer::class);
    }

    /**
     * @param GetAllAccCurrencyRevaluationaItemsRequest $request
     * @return array
     */
    public function getAllAccCurrencyRevaluationaItems(GetAllAccCurrencyRevaluationaItemsRequest $request)
    {
        $acccurrencyrevaluationaitems = Apiato::call('AccCurrencyRevaluationaItem@GetAllAccCurrencyRevaluationaItemsAction', [$request]);

        return $this->transform($acccurrencyrevaluationaitems, AccCurrencyRevaluationaItemTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyRevaluationaItemRequest $request
     * @return array
     */
    public function updateAccCurrencyRevaluationaItem(UpdateAccCurrencyRevaluationaItemRequest $request)
    {
        $acccurrencyrevaluationaitem = Apiato::call('AccCurrencyRevaluationaItem@UpdateAccCurrencyRevaluationaItemAction', [$request]);

        $this->uploadMedia( $acccurrencyrevaluationaitem, "image", true );
        $this->uploadMedia( $acccurrencyrevaluationaitem, "gallery" );
        $this->uploadMedia( $acccurrencyrevaluationaitem, "file" );

        return $this->transform($acccurrencyrevaluationaitem, AccCurrencyRevaluationaItemTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyRevaluationaItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrencyRevaluationaItem(DeleteAccCurrencyRevaluationaItemRequest $request)
    {
        Apiato::call('AccCurrencyRevaluationaItem@DeleteAccCurrencyRevaluationaItemAction', [$request]);

        return $this->noContent();
    }
}
