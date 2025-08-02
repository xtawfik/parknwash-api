<?php

namespace App\Containers\Partner\UI\API\Controllers;

use App\Containers\Partner\UI\API\Requests\CreatePartnerRequest;
use App\Containers\Partner\UI\API\Requests\DeletePartnerRequest;
use App\Containers\Partner\UI\API\Requests\GetAllPartnersRequest;
use App\Containers\Partner\UI\API\Requests\FindPartnerByIdRequest;
use App\Containers\Partner\UI\API\Requests\UpdatePartnerRequest;
use App\Containers\Partner\UI\API\Transformers\PartnerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Partner\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePartnerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPartner(CreatePartnerRequest $request)
    {
        $partner = Apiato::call('Partner@CreatePartnerAction', [$request]);

        $this->uploadMedia( $partner, "image", true );
        $this->uploadMedia( $partner, "gallery" );
        $this->uploadMedia( $partner, "file" );

        return $this->created($this->transform($partner, PartnerTransformer::class));
    }

    /**
     * @param FindPartnerByIdRequest $request
     * @return array
     */
    public function findPartnerById(FindPartnerByIdRequest $request)
    {
        $partner = Apiato::call('Partner@FindPartnerByIdAction', [$request]);

        return $this->transform($partner, PartnerTransformer::class);
    }

    /**
     * @param GetAllPartnersRequest $request
     * @return array
     */
    public function getAllPartners(GetAllPartnersRequest $request)
    {
        $partners = Apiato::call('Partner@GetAllPartnersAction', [$request]);

        return $this->transform($partners, PartnerTransformer::class);
    }

    /**
     * @param UpdatePartnerRequest $request
     * @return array
     */
    public function updatePartner(UpdatePartnerRequest $request)
    {
        $partner = Apiato::call('Partner@UpdatePartnerAction', [$request]);

        $this->uploadMedia( $partner, "image", true );
        $this->uploadMedia( $partner, "gallery" );
        $this->uploadMedia( $partner, "file" );

        return $this->transform($partner, PartnerTransformer::class);
    }

    /**
     * @param DeletePartnerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePartner(DeletePartnerRequest $request)
    {
        Apiato::call('Partner@DeletePartnerAction', [$request]);

        return $this->noContent();
    }
}
