<?php

namespace App\Containers\AccTaxCodeCustom\UI\API\Controllers;

use App\Containers\AccTaxCodeCustom\UI\API\Requests\CreateAccTaxCodeCustomRequest;
use App\Containers\AccTaxCodeCustom\UI\API\Requests\DeleteAccTaxCodeCustomRequest;
use App\Containers\AccTaxCodeCustom\UI\API\Requests\GetAllAccTaxCodeCustomsRequest;
use App\Containers\AccTaxCodeCustom\UI\API\Requests\FindAccTaxCodeCustomByIdRequest;
use App\Containers\AccTaxCodeCustom\UI\API\Requests\UpdateAccTaxCodeCustomRequest;
use App\Containers\AccTaxCodeCustom\UI\API\Transformers\AccTaxCodeCustomTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccTaxCodeCustom\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccTaxCodeCustomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccTaxCodeCustom(CreateAccTaxCodeCustomRequest $request)
    {
        $acctaxcodecustom = Apiato::call('AccTaxCodeCustom@CreateAccTaxCodeCustomAction', [$request]);

        $this->uploadMedia( $acctaxcodecustom, "image", true );
        $this->uploadMedia( $acctaxcodecustom, "gallery" );
        $this->uploadMedia( $acctaxcodecustom, "file" );

        return $this->created($this->transform($acctaxcodecustom, AccTaxCodeCustomTransformer::class));
    }

    /**
     * @param FindAccTaxCodeCustomByIdRequest $request
     * @return array
     */
    public function findAccTaxCodeCustomById(FindAccTaxCodeCustomByIdRequest $request)
    {
        $acctaxcodecustom = Apiato::call('AccTaxCodeCustom@FindAccTaxCodeCustomByIdAction', [$request]);

        return $this->transform($acctaxcodecustom, AccTaxCodeCustomTransformer::class);
    }

    /**
     * @param GetAllAccTaxCodeCustomsRequest $request
     * @return array
     */
    public function getAllAccTaxCodeCustoms(GetAllAccTaxCodeCustomsRequest $request)
    {
        $acctaxcodecustoms = Apiato::call('AccTaxCodeCustom@GetAllAccTaxCodeCustomsAction', [$request]);

        return $this->transform($acctaxcodecustoms, AccTaxCodeCustomTransformer::class);
    }

    /**
     * @param UpdateAccTaxCodeCustomRequest $request
     * @return array
     */
    public function updateAccTaxCodeCustom(UpdateAccTaxCodeCustomRequest $request)
    {
        $acctaxcodecustom = Apiato::call('AccTaxCodeCustom@UpdateAccTaxCodeCustomAction', [$request]);

        $this->uploadMedia( $acctaxcodecustom, "image", true );
        $this->uploadMedia( $acctaxcodecustom, "gallery" );
        $this->uploadMedia( $acctaxcodecustom, "file" );

        return $this->transform($acctaxcodecustom, AccTaxCodeCustomTransformer::class);
    }

    /**
     * @param DeleteAccTaxCodeCustomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccTaxCodeCustom(DeleteAccTaxCodeCustomRequest $request)
    {
        Apiato::call('AccTaxCodeCustom@DeleteAccTaxCodeCustomAction', [$request]);

        return $this->noContent();
    }
}
