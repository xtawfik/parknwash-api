<?php

namespace App\Containers\AccTaxCode\UI\API\Controllers;

use App\Containers\AccTaxCode\UI\API\Requests\CreateAccTaxCodeRequest;
use App\Containers\AccTaxCode\UI\API\Requests\DeleteAccTaxCodeRequest;
use App\Containers\AccTaxCode\UI\API\Requests\GetAllAccTaxCodesRequest;
use App\Containers\AccTaxCode\UI\API\Requests\FindAccTaxCodeByIdRequest;
use App\Containers\AccTaxCode\UI\API\Requests\UpdateAccTaxCodeRequest;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccTaxCode\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccTaxCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccTaxCode(CreateAccTaxCodeRequest $request)
    {
        $acctaxcode = Apiato::call('AccTaxCode@CreateAccTaxCodeAction', [$request]);

        $this->uploadMedia( $acctaxcode, "image", true );
        $this->uploadMedia( $acctaxcode, "gallery" );
        $this->uploadMedia( $acctaxcode, "file" );

        return $this->created($this->transform($acctaxcode, AccTaxCodeTransformer::class));
    }

    /**
     * @param FindAccTaxCodeByIdRequest $request
     * @return array
     */
    public function findAccTaxCodeById(FindAccTaxCodeByIdRequest $request)
    {
        $acctaxcode = Apiato::call('AccTaxCode@FindAccTaxCodeByIdAction', [$request]);

        return $this->transform($acctaxcode, AccTaxCodeTransformer::class);
    }

    /**
     * @param GetAllAccTaxCodesRequest $request
     * @return array
     */
    public function getAllAccTaxCodes(GetAllAccTaxCodesRequest $request)
    {
        $acctaxcodes = Apiato::call('AccTaxCode@GetAllAccTaxCodesAction', [$request]);

        return $this->transform($acctaxcodes, AccTaxCodeTransformer::class);
    }

    /**
     * @param UpdateAccTaxCodeRequest $request
     * @return array
     */
    public function updateAccTaxCode(UpdateAccTaxCodeRequest $request)
    {
        $acctaxcode = Apiato::call('AccTaxCode@UpdateAccTaxCodeAction', [$request]);

        $this->uploadMedia( $acctaxcode, "image", true );
        $this->uploadMedia( $acctaxcode, "gallery" );
        $this->uploadMedia( $acctaxcode, "file" );

        return $this->transform($acctaxcode, AccTaxCodeTransformer::class);
    }

    /**
     * @param DeleteAccTaxCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccTaxCode(DeleteAccTaxCodeRequest $request)
    {
        Apiato::call('AccTaxCode@DeleteAccTaxCodeAction', [$request]);

        return $this->noContent();
    }
}
