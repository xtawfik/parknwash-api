<?php

namespace App\Containers\AccLockDate\UI\API\Controllers;

use App\Containers\AccLockDate\UI\API\Requests\CreateAccLockDateRequest;
use App\Containers\AccLockDate\UI\API\Requests\DeleteAccLockDateRequest;
use App\Containers\AccLockDate\UI\API\Requests\GetAllAccLockDatesRequest;
use App\Containers\AccLockDate\UI\API\Requests\FindAccLockDateByIdRequest;
use App\Containers\AccLockDate\UI\API\Requests\UpdateAccLockDateRequest;
use App\Containers\AccLockDate\UI\API\Transformers\AccLockDateTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccLockDate\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccLockDateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccLockDate(CreateAccLockDateRequest $request)
    {
        $acclockdate = Apiato::call('AccLockDate@CreateAccLockDateAction', [$request]);

        $this->uploadMedia( $acclockdate, "image", true );
        $this->uploadMedia( $acclockdate, "gallery" );
        $this->uploadMedia( $acclockdate, "file" );

        return $this->created($this->transform($acclockdate, AccLockDateTransformer::class));
    }

    /**
     * @param FindAccLockDateByIdRequest $request
     * @return array
     */
    public function findAccLockDateById(FindAccLockDateByIdRequest $request)
    {
        $acclockdate = Apiato::call('AccLockDate@FindAccLockDateByIdAction', [$request]);

        return $this->transform($acclockdate, AccLockDateTransformer::class);
    }

    /**
     * @param GetAllAccLockDatesRequest $request
     * @return array
     */
    public function getAllAccLockDates(GetAllAccLockDatesRequest $request)
    {
        $acclockdates = Apiato::call('AccLockDate@GetAllAccLockDatesAction', [$request]);

        return $this->transform($acclockdates, AccLockDateTransformer::class);
    }

    /**
     * @param UpdateAccLockDateRequest $request
     * @return array
     */
    public function updateAccLockDate(UpdateAccLockDateRequest $request)
    {
        $acclockdate = Apiato::call('AccLockDate@UpdateAccLockDateAction', [$request]);

        $this->uploadMedia( $acclockdate, "image", true );
        $this->uploadMedia( $acclockdate, "gallery" );
        $this->uploadMedia( $acclockdate, "file" );

        return $this->transform($acclockdate, AccLockDateTransformer::class);
    }

    /**
     * @param DeleteAccLockDateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccLockDate(DeleteAccLockDateRequest $request)
    {
        Apiato::call('AccLockDate@DeleteAccLockDateAction', [$request]);

        return $this->noContent();
    }
}
