<?php

namespace App\Containers\AccInvestmentRevaluationItem\UI\API\Controllers;

use App\Containers\AccInvestmentRevaluationItem\UI\API\Requests\CreateAccInvestmentRevaluationItemRequest;
use App\Containers\AccInvestmentRevaluationItem\UI\API\Requests\DeleteAccInvestmentRevaluationItemRequest;
use App\Containers\AccInvestmentRevaluationItem\UI\API\Requests\GetAllAccInvestmentRevaluationItemsRequest;
use App\Containers\AccInvestmentRevaluationItem\UI\API\Requests\FindAccInvestmentRevaluationItemByIdRequest;
use App\Containers\AccInvestmentRevaluationItem\UI\API\Requests\UpdateAccInvestmentRevaluationItemRequest;
use App\Containers\AccInvestmentRevaluationItem\UI\API\Transformers\AccInvestmentRevaluationItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInvestmentRevaluationItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInvestmentRevaluationItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInvestmentRevaluationItem(CreateAccInvestmentRevaluationItemRequest $request)
    {
        $accinvestmentrevaluationitem = Apiato::call('AccInvestmentRevaluationItem@CreateAccInvestmentRevaluationItemAction', [$request]);

        $this->uploadMedia( $accinvestmentrevaluationitem, "image", true );
        $this->uploadMedia( $accinvestmentrevaluationitem, "gallery" );
        $this->uploadMedia( $accinvestmentrevaluationitem, "file" );

        return $this->created($this->transform($accinvestmentrevaluationitem, AccInvestmentRevaluationItemTransformer::class));
    }

    /**
     * @param FindAccInvestmentRevaluationItemByIdRequest $request
     * @return array
     */
    public function findAccInvestmentRevaluationItemById(FindAccInvestmentRevaluationItemByIdRequest $request)
    {
        $accinvestmentrevaluationitem = Apiato::call('AccInvestmentRevaluationItem@FindAccInvestmentRevaluationItemByIdAction', [$request]);

        return $this->transform($accinvestmentrevaluationitem, AccInvestmentRevaluationItemTransformer::class);
    }

    /**
     * @param GetAllAccInvestmentRevaluationItemsRequest $request
     * @return array
     */
    public function getAllAccInvestmentRevaluationItems(GetAllAccInvestmentRevaluationItemsRequest $request)
    {
        $accinvestmentrevaluationitems = Apiato::call('AccInvestmentRevaluationItem@GetAllAccInvestmentRevaluationItemsAction', [$request]);

        return $this->transform($accinvestmentrevaluationitems, AccInvestmentRevaluationItemTransformer::class);
    }

    /**
     * @param UpdateAccInvestmentRevaluationItemRequest $request
     * @return array
     */
    public function updateAccInvestmentRevaluationItem(UpdateAccInvestmentRevaluationItemRequest $request)
    {
        $accinvestmentrevaluationitem = Apiato::call('AccInvestmentRevaluationItem@UpdateAccInvestmentRevaluationItemAction', [$request]);

        $this->uploadMedia( $accinvestmentrevaluationitem, "image", true );
        $this->uploadMedia( $accinvestmentrevaluationitem, "gallery" );
        $this->uploadMedia( $accinvestmentrevaluationitem, "file" );

        return $this->transform($accinvestmentrevaluationitem, AccInvestmentRevaluationItemTransformer::class);
    }

    /**
     * @param DeleteAccInvestmentRevaluationItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInvestmentRevaluationItem(DeleteAccInvestmentRevaluationItemRequest $request)
    {
        Apiato::call('AccInvestmentRevaluationItem@DeleteAccInvestmentRevaluationItemAction', [$request]);

        return $this->noContent();
    }
}
