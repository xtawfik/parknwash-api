<?php

namespace App\Containers\AccPurchaseQuote\UI\API\Controllers;

use App\Containers\AccPurchaseQuote\UI\API\Requests\CreateAccPurchaseQuoteRequest;
use App\Containers\AccPurchaseQuote\UI\API\Requests\DeleteAccPurchaseQuoteRequest;
use App\Containers\AccPurchaseQuote\UI\API\Requests\GetAllAccPurchaseQuotesRequest;
use App\Containers\AccPurchaseQuote\UI\API\Requests\FindAccPurchaseQuoteByIdRequest;
use App\Containers\AccPurchaseQuote\UI\API\Requests\UpdateAccPurchaseQuoteRequest;
use App\Containers\AccPurchaseQuote\UI\API\Transformers\AccPurchaseQuoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPurchaseQuote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPurchaseQuoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPurchaseQuote(CreateAccPurchaseQuoteRequest $request)
    {
        $accpurchasequote = Apiato::call('AccPurchaseQuote@CreateAccPurchaseQuoteAction', [$request]);

        $this->uploadMedia( $accpurchasequote, "image", true );
        $this->uploadMedia( $accpurchasequote, "gallery" );
        $this->uploadMedia( $accpurchasequote, "file" );

        return $this->created($this->transform($accpurchasequote, AccPurchaseQuoteTransformer::class));
    }

    /**
     * @param FindAccPurchaseQuoteByIdRequest $request
     * @return array
     */
    public function findAccPurchaseQuoteById(FindAccPurchaseQuoteByIdRequest $request)
    {
        $accpurchasequote = Apiato::call('AccPurchaseQuote@FindAccPurchaseQuoteByIdAction', [$request]);

        return $this->transform($accpurchasequote, AccPurchaseQuoteTransformer::class);
    }

    /**
     * @param GetAllAccPurchaseQuotesRequest $request
     * @return array
     */
    public function getAllAccPurchaseQuotes(GetAllAccPurchaseQuotesRequest $request)
    {
        $accpurchasequotes = Apiato::call('AccPurchaseQuote@GetAllAccPurchaseQuotesAction', [$request]);

        return $this->transform($accpurchasequotes, AccPurchaseQuoteTransformer::class);
    }

    /**
     * @param UpdateAccPurchaseQuoteRequest $request
     * @return array
     */
    public function updateAccPurchaseQuote(UpdateAccPurchaseQuoteRequest $request)
    {
        $accpurchasequote = Apiato::call('AccPurchaseQuote@UpdateAccPurchaseQuoteAction', [$request]);

        $this->uploadMedia( $accpurchasequote, "image", true );
        $this->uploadMedia( $accpurchasequote, "gallery" );
        $this->uploadMedia( $accpurchasequote, "file" );

        return $this->transform($accpurchasequote, AccPurchaseQuoteTransformer::class);
    }

    /**
     * @param DeleteAccPurchaseQuoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPurchaseQuote(DeleteAccPurchaseQuoteRequest $request)
    {
        Apiato::call('AccPurchaseQuote@DeleteAccPurchaseQuoteAction', [$request]);

        return $this->noContent();
    }
}
