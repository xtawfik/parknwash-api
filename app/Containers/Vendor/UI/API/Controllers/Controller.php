<?php

namespace App\Containers\Vendor\UI\API\Controllers;

use App\Containers\Vendor\UI\API\Requests\CreateVendorRequest;
use App\Containers\Vendor\UI\API\Requests\DeleteVendorRequest;
use App\Containers\Vendor\UI\API\Requests\GetAllVendorsRequest;
use App\Containers\Vendor\UI\API\Requests\FindVendorByIdRequest;
use App\Containers\Vendor\UI\API\Requests\UpdateVendorRequest;
use App\Containers\Vendor\UI\API\Transformers\VendorTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Vendor\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateVendorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVendor(CreateVendorRequest $request)
    {
        $vendor = Apiato::call('Vendor@CreateVendorAction', [$request]);

        $this->uploadMedia( $vendor, "image", true );
        $this->uploadMedia( $vendor, "gallery" );
        $this->uploadMedia( $vendor, "file" );

        return $this->created($this->transform($vendor, VendorTransformer::class));
    }

    /**
     * @param FindVendorByIdRequest $request
     * @return array
     */
    public function findVendorById(FindVendorByIdRequest $request)
    {
        $vendor = Apiato::call('Vendor@FindVendorByIdAction', [$request]);

        return $this->transform($vendor, VendorTransformer::class);
    }

    /**
     * @param GetAllVendorsRequest $request
     * @return array
     */
    public function getAllVendors(GetAllVendorsRequest $request)
    {
        $vendors = Apiato::call('Vendor@GetAllVendorsAction', [$request]);

        return $this->transform($vendors, VendorTransformer::class);
    }

    /**
     * @param UpdateVendorRequest $request
     * @return array
     */
    public function updateVendor(UpdateVendorRequest $request)
    {
        $vendor = Apiato::call('Vendor@UpdateVendorAction', [$request]);

        $this->uploadMedia( $vendor, "image", true );
        $this->uploadMedia( $vendor, "gallery" );
        $this->uploadMedia( $vendor, "file" );

        return $this->transform($vendor, VendorTransformer::class);
    }

    /**
     * @param DeleteVendorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVendor(DeleteVendorRequest $request)
    {
        Apiato::call('Vendor@DeleteVendorAction', [$request]);

        return $this->noContent();
    }
}
