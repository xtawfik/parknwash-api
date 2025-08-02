<?php

namespace App\Containers\AccCurrency\UI\API\Controllers;

use App\Containers\AccCurrency\UI\API\Requests\CreateAccCurrencyRequest;
use App\Containers\AccCurrency\UI\API\Requests\DeleteAccCurrencyRequest;
use App\Containers\AccCurrency\UI\API\Requests\GetAllAccCurrenciesRequest;
use App\Containers\AccCurrency\UI\API\Requests\FindAccCurrencyByIdRequest;
use App\Containers\AccCurrency\UI\API\Requests\UpdateAccCurrencyRequest;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrency\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrency(CreateAccCurrencyRequest $request)
    {
        $acccurrency = Apiato::call('AccCurrency@CreateAccCurrencyAction', [$request]);

        $this->uploadMedia( $acccurrency, "image", true );
        $this->uploadMedia( $acccurrency, "gallery" );
        $this->uploadMedia( $acccurrency, "file" );

        return $this->created($this->transform($acccurrency, AccCurrencyTransformer::class));
    }

    /**
     * @param FindAccCurrencyByIdRequest $request
     * @return array
     */
    public function findAccCurrencyById(FindAccCurrencyByIdRequest $request)
    {
        $acccurrency = Apiato::call('AccCurrency@FindAccCurrencyByIdAction', [$request]);

        return $this->transform($acccurrency, AccCurrencyTransformer::class);
    }

    /**
     * @param GetAllAccCurrenciesRequest $request
     * @return array
     */
    public function getAllAccCurrencies(GetAllAccCurrenciesRequest $request)
    {
        $acccurrencies = Apiato::call('AccCurrency@GetAllAccCurrenciesAction', [$request]);

        return $this->transform($acccurrencies, AccCurrencyTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyRequest $request
     * @return array
     */
    public function updateAccCurrency(UpdateAccCurrencyRequest $request)
    {
        $acccurrency = Apiato::call('AccCurrency@UpdateAccCurrencyAction', [$request]);

        $this->uploadMedia( $acccurrency, "image", true );
        $this->uploadMedia( $acccurrency, "gallery" );
        $this->uploadMedia( $acccurrency, "file" );

        return $this->transform($acccurrency, AccCurrencyTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrency(DeleteAccCurrencyRequest $request)
    {
        Apiato::call('AccCurrency@DeleteAccCurrencyAction', [$request]);

        return $this->noContent();
    }
}
