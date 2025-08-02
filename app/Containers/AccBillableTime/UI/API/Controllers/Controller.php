<?php

namespace App\Containers\AccBillableTime\UI\API\Controllers;

use App\Containers\AccBillableTime\UI\API\Requests\CreateAccBillableTimeRequest;
use App\Containers\AccBillableTime\UI\API\Requests\DeleteAccBillableTimeRequest;
use App\Containers\AccBillableTime\UI\API\Requests\GetAllAccBillableTimesRequest;
use App\Containers\AccBillableTime\UI\API\Requests\FindAccBillableTimeByIdRequest;
use App\Containers\AccBillableTime\UI\API\Requests\UpdateAccBillableTimeRequest;
use App\Containers\AccBillableTime\UI\API\Transformers\AccBillableTimeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBillableTime\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBillableTimeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBillableTime(CreateAccBillableTimeRequest $request)
    {
        $accbillabletime = Apiato::call('AccBillableTime@CreateAccBillableTimeAction', [$request]);

        $this->uploadMedia( $accbillabletime, "image", true );
        $this->uploadMedia( $accbillabletime, "gallery" );
        $this->uploadMedia( $accbillabletime, "file" );

        return $this->created($this->transform($accbillabletime, AccBillableTimeTransformer::class));
    }

    /**
     * @param FindAccBillableTimeByIdRequest $request
     * @return array
     */
    public function findAccBillableTimeById(FindAccBillableTimeByIdRequest $request)
    {
        $accbillabletime = Apiato::call('AccBillableTime@FindAccBillableTimeByIdAction', [$request]);

        return $this->transform($accbillabletime, AccBillableTimeTransformer::class);
    }

    /**
     * @param GetAllAccBillableTimesRequest $request
     * @return array
     */
    public function getAllAccBillableTimes(GetAllAccBillableTimesRequest $request)
    {
        $accbillabletimes = Apiato::call('AccBillableTime@GetAllAccBillableTimesAction', [$request]);

        return $this->transform($accbillabletimes, AccBillableTimeTransformer::class);
    }

    /**
     * @param UpdateAccBillableTimeRequest $request
     * @return array
     */
    public function updateAccBillableTime(UpdateAccBillableTimeRequest $request)
    {
        $accbillabletime = Apiato::call('AccBillableTime@UpdateAccBillableTimeAction', [$request]);

        $this->uploadMedia( $accbillabletime, "image", true );
        $this->uploadMedia( $accbillabletime, "gallery" );
        $this->uploadMedia( $accbillabletime, "file" );

        return $this->transform($accbillabletime, AccBillableTimeTransformer::class);
    }

    /**
     * @param DeleteAccBillableTimeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBillableTime(DeleteAccBillableTimeRequest $request)
    {
        Apiato::call('AccBillableTime@DeleteAccBillableTimeAction', [$request]);

        return $this->noContent();
    }
}
