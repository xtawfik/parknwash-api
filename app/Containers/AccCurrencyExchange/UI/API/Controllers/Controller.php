<?php

namespace App\Containers\AccCurrencyExchange\UI\API\Controllers;

use App\Containers\AccCurrencyExchange\UI\API\Requests\CreateAccCurrencyExchangeRequest;
use App\Containers\AccCurrencyExchange\UI\API\Requests\DeleteAccCurrencyExchangeRequest;
use App\Containers\AccCurrencyExchange\UI\API\Requests\GetAllAccCurrencyExchangesRequest;
use App\Containers\AccCurrencyExchange\UI\API\Requests\FindAccCurrencyExchangeByIdRequest;
use App\Containers\AccCurrencyExchange\UI\API\Requests\UpdateAccCurrencyExchangeRequest;
use App\Containers\AccCurrencyExchange\UI\API\Transformers\AccCurrencyExchangeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrencyExchange\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyExchangeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrencyExchange(CreateAccCurrencyExchangeRequest $request)
    {
        $acccurrencyexchange = Apiato::call('AccCurrencyExchange@CreateAccCurrencyExchangeAction', [$request]);

        $this->uploadMedia( $acccurrencyexchange, "image", true );
        $this->uploadMedia( $acccurrencyexchange, "gallery" );
        $this->uploadMedia( $acccurrencyexchange, "file" );

        return $this->created($this->transform($acccurrencyexchange, AccCurrencyExchangeTransformer::class));
    }

    /**
     * @param FindAccCurrencyExchangeByIdRequest $request
     * @return array
     */
    public function findAccCurrencyExchangeById(FindAccCurrencyExchangeByIdRequest $request)
    {
        $acccurrencyexchange = Apiato::call('AccCurrencyExchange@FindAccCurrencyExchangeByIdAction', [$request]);

        return $this->transform($acccurrencyexchange, AccCurrencyExchangeTransformer::class);
    }

    /**
     * @param GetAllAccCurrencyExchangesRequest $request
     * @return array
     */
    public function getAllAccCurrencyExchanges(GetAllAccCurrencyExchangesRequest $request)
    {
        $acccurrencyexchanges = Apiato::call('AccCurrencyExchange@GetAllAccCurrencyExchangesAction', [$request]);

        return $this->transform($acccurrencyexchanges, AccCurrencyExchangeTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyExchangeRequest $request
     * @return array
     */
    public function updateAccCurrencyExchange(UpdateAccCurrencyExchangeRequest $request)
    {
        $acccurrencyexchange = Apiato::call('AccCurrencyExchange@UpdateAccCurrencyExchangeAction', [$request]);

        $this->uploadMedia( $acccurrencyexchange, "image", true );
        $this->uploadMedia( $acccurrencyexchange, "gallery" );
        $this->uploadMedia( $acccurrencyexchange, "file" );

        return $this->transform($acccurrencyexchange, AccCurrencyExchangeTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyExchangeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrencyExchange(DeleteAccCurrencyExchangeRequest $request)
    {
        Apiato::call('AccCurrencyExchange@DeleteAccCurrencyExchangeAction', [$request]);

        return $this->noContent();
    }
}
