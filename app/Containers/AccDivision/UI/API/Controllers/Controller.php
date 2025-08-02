<?php

namespace App\Containers\AccDivision\UI\API\Controllers;

use App\Containers\AccDivision\UI\API\Requests\CreateAccDivisionRequest;
use App\Containers\AccDivision\UI\API\Requests\DeleteAccDivisionRequest;
use App\Containers\AccDivision\UI\API\Requests\GetAllAccDivisionsRequest;
use App\Containers\AccDivision\UI\API\Requests\FindAccDivisionByIdRequest;
use App\Containers\AccDivision\UI\API\Requests\UpdateAccDivisionRequest;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccDivision\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccDivisionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccDivision(CreateAccDivisionRequest $request)
    {
        $accdivision = Apiato::call('AccDivision@CreateAccDivisionAction', [$request]);

        $this->uploadMedia( $accdivision, "image", true );
        $this->uploadMedia( $accdivision, "gallery" );
        $this->uploadMedia( $accdivision, "file" );

        return $this->created($this->transform($accdivision, AccDivisionTransformer::class));
    }

    /**
     * @param FindAccDivisionByIdRequest $request
     * @return array
     */
    public function findAccDivisionById(FindAccDivisionByIdRequest $request)
    {
        $accdivision = Apiato::call('AccDivision@FindAccDivisionByIdAction', [$request]);

        return $this->transform($accdivision, AccDivisionTransformer::class);
    }

    /**
     * @param GetAllAccDivisionsRequest $request
     * @return array
     */
    public function getAllAccDivisions(GetAllAccDivisionsRequest $request)
    {
        $accdivisions = Apiato::call('AccDivision@GetAllAccDivisionsAction', [$request]);

        return $this->transform($accdivisions, AccDivisionTransformer::class);
    }

    /**
     * @param UpdateAccDivisionRequest $request
     * @return array
     */
    public function updateAccDivision(UpdateAccDivisionRequest $request)
    {
        $accdivision = Apiato::call('AccDivision@UpdateAccDivisionAction', [$request]);

        $this->uploadMedia( $accdivision, "image", true );
        $this->uploadMedia( $accdivision, "gallery" );
        $this->uploadMedia( $accdivision, "file" );

        return $this->transform($accdivision, AccDivisionTransformer::class);
    }

    /**
     * @param DeleteAccDivisionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccDivision(DeleteAccDivisionRequest $request)
    {
        Apiato::call('AccDivision@DeleteAccDivisionAction', [$request]);

        return $this->noContent();
    }
}
