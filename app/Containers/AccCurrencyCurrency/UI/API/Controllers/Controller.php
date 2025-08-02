<?php

namespace App\Containers\AccCurrencyCurrency\UI\API\Controllers;

use App\Containers\AccCurrencyCurrency\UI\API\Requests\CreateAccCurrencyCurrencyRequest;
use App\Containers\AccCurrencyCurrency\UI\API\Requests\DeleteAccCurrencyCurrencyRequest;
use App\Containers\AccCurrencyCurrency\UI\API\Requests\GetAllAccCurrencyCurrenciesRequest;
use App\Containers\AccCurrencyCurrency\UI\API\Requests\FindAccCurrencyCurrencyByIdRequest;
use App\Containers\AccCurrencyCurrency\UI\API\Requests\UpdateAccCurrencyCurrencyRequest;
use App\Containers\AccCurrencyCurrency\UI\API\Transformers\AccCurrencyCurrencyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrencyCurrency\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyCurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrencyCurrency(CreateAccCurrencyCurrencyRequest $request)
    {
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@CreateAccCurrencyCurrencyAction', [$request]);

        $this->uploadMedia( $acccurrencycurrency, "image", true );
        $this->uploadMedia( $acccurrencycurrency, "gallery" );
        $this->uploadMedia( $acccurrencycurrency, "file" );

        return $this->created($this->transform($acccurrencycurrency, AccCurrencyCurrencyTransformer::class));
    }

    /**
     * @param FindAccCurrencyCurrencyByIdRequest $request
     * @return array
     */
    public function findAccCurrencyCurrencyById(FindAccCurrencyCurrencyByIdRequest $request)
    {
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@FindAccCurrencyCurrencyByIdAction', [$request]);

        return $this->transform($acccurrencycurrency, AccCurrencyCurrencyTransformer::class);
    }

    /**
     * @param GetAllAccCurrencyCurrenciesRequest $request
     * @return array
     */
    public function getAllAccCurrencyCurrencies(GetAllAccCurrencyCurrenciesRequest $request)
    {
        $acccurrencycurrencies = Apiato::call('AccCurrencyCurrency@GetAllAccCurrencyCurrenciesAction', [$request]);

        return $this->transform($acccurrencycurrencies, AccCurrencyCurrencyTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyCurrencyRequest $request
     * @return array
     */
    public function updateAccCurrencyCurrency(UpdateAccCurrencyCurrencyRequest $request)
    {
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@UpdateAccCurrencyCurrencyAction', [$request]);

        $this->uploadMedia( $acccurrencycurrency, "image", true );
        $this->uploadMedia( $acccurrencycurrency, "gallery" );
        $this->uploadMedia( $acccurrencycurrency, "file" );

        return $this->transform($acccurrencycurrency, AccCurrencyCurrencyTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyCurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrencyCurrency(DeleteAccCurrencyCurrencyRequest $request)
    {
        Apiato::call('AccCurrencyCurrency@DeleteAccCurrencyCurrencyAction', [$request]);

        return $this->noContent();
    }
}
