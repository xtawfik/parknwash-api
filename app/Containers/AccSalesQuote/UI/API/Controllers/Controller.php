<?php

namespace App\Containers\AccSalesQuote\UI\API\Controllers;

use App\Containers\AccSalesQuote\UI\API\Requests\CreateAccSalesQuoteRequest;
use App\Containers\AccSalesQuote\UI\API\Requests\DeleteAccSalesQuoteRequest;
use App\Containers\AccSalesQuote\UI\API\Requests\GetAllAccSalesQuotesRequest;
use App\Containers\AccSalesQuote\UI\API\Requests\FindAccSalesQuoteByIdRequest;
use App\Containers\AccSalesQuote\UI\API\Requests\UpdateAccSalesQuoteRequest;
use App\Containers\AccSalesQuote\UI\API\Transformers\AccSalesQuoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccSalesQuote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccSalesQuoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccSalesQuote(CreateAccSalesQuoteRequest $request)
    {
        $accsalesquote = Apiato::call('AccSalesQuote@CreateAccSalesQuoteAction', [$request]);

        $this->uploadMedia( $accsalesquote, "image", true );
        $this->uploadMedia( $accsalesquote, "gallery" );
        $this->uploadMedia( $accsalesquote, "file" );

        return $this->created($this->transform($accsalesquote, AccSalesQuoteTransformer::class));
    }

    /**
     * @param FindAccSalesQuoteByIdRequest $request
     * @return array
     */
    public function findAccSalesQuoteById(FindAccSalesQuoteByIdRequest $request)
    {
        $accsalesquote = Apiato::call('AccSalesQuote@FindAccSalesQuoteByIdAction', [$request]);

        return $this->transform($accsalesquote, AccSalesQuoteTransformer::class);
    }

    /**
     * @param GetAllAccSalesQuotesRequest $request
     * @return array
     */
    public function getAllAccSalesQuotes(GetAllAccSalesQuotesRequest $request)
    {
        $accsalesquotes = Apiato::call('AccSalesQuote@GetAllAccSalesQuotesAction', [$request]);

        return $this->transform($accsalesquotes, AccSalesQuoteTransformer::class);
    }

    /**
     * @param UpdateAccSalesQuoteRequest $request
     * @return array
     */
    public function updateAccSalesQuote(UpdateAccSalesQuoteRequest $request)
    {
        $accsalesquote = Apiato::call('AccSalesQuote@UpdateAccSalesQuoteAction', [$request]);

        $this->uploadMedia( $accsalesquote, "image", true );
        $this->uploadMedia( $accsalesquote, "gallery" );
        $this->uploadMedia( $accsalesquote, "file" );

        return $this->transform($accsalesquote, AccSalesQuoteTransformer::class);
    }

    /**
     * @param DeleteAccSalesQuoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccSalesQuote(DeleteAccSalesQuoteRequest $request)
    {
        Apiato::call('AccSalesQuote@DeleteAccSalesQuoteAction', [$request]);

        return $this->noContent();
    }
}
