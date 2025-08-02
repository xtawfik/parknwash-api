<?php

namespace App\Containers\AccForecast\UI\API\Controllers;

use App\Containers\AccForecast\UI\API\Requests\CreateAccForecastRequest;
use App\Containers\AccForecast\UI\API\Requests\DeleteAccForecastRequest;
use App\Containers\AccForecast\UI\API\Requests\GetAllAccForecastsRequest;
use App\Containers\AccForecast\UI\API\Requests\FindAccForecastByIdRequest;
use App\Containers\AccForecast\UI\API\Requests\UpdateAccForecastRequest;
use App\Containers\AccForecast\UI\API\Transformers\AccForecastTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccForecast\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccForecastRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccForecast(CreateAccForecastRequest $request)
    {
        $accforecast = Apiato::call('AccForecast@CreateAccForecastAction', [$request]);

        $this->uploadMedia( $accforecast, "image", true );
        $this->uploadMedia( $accforecast, "gallery" );
        $this->uploadMedia( $accforecast, "file" );

        return $this->created($this->transform($accforecast, AccForecastTransformer::class));
    }

    /**
     * @param FindAccForecastByIdRequest $request
     * @return array
     */
    public function findAccForecastById(FindAccForecastByIdRequest $request)
    {
        $accforecast = Apiato::call('AccForecast@FindAccForecastByIdAction', [$request]);

        return $this->transform($accforecast, AccForecastTransformer::class);
    }

    /**
     * @param GetAllAccForecastsRequest $request
     * @return array
     */
    public function getAllAccForecasts(GetAllAccForecastsRequest $request)
    {
        $accforecasts = Apiato::call('AccForecast@GetAllAccForecastsAction', [$request]);

        return $this->transform($accforecasts, AccForecastTransformer::class);
    }

    /**
     * @param UpdateAccForecastRequest $request
     * @return array
     */
    public function updateAccForecast(UpdateAccForecastRequest $request)
    {
        $accforecast = Apiato::call('AccForecast@UpdateAccForecastAction', [$request]);

        $this->uploadMedia( $accforecast, "image", true );
        $this->uploadMedia( $accforecast, "gallery" );
        $this->uploadMedia( $accforecast, "file" );

        return $this->transform($accforecast, AccForecastTransformer::class);
    }

    /**
     * @param DeleteAccForecastRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccForecast(DeleteAccForecastRequest $request)
    {
        Apiato::call('AccForecast@DeleteAccForecastAction', [$request]);

        return $this->noContent();
    }
}
