<?php

namespace App\Containers\GeneralOption\UI\API\Controllers;

use App\Containers\GeneralOption\UI\API\Requests\CreateGeneralOptionRequest;
use App\Containers\GeneralOption\UI\API\Requests\DeleteGeneralOptionRequest;
use App\Containers\GeneralOption\UI\API\Requests\GetAllGeneralOptionsRequest;
use App\Containers\GeneralOption\UI\API\Requests\FindGeneralOptionByIdRequest;
use App\Containers\GeneralOption\UI\API\Requests\UpdateGeneralOptionRequest;
use App\Containers\GeneralOption\UI\API\Transformers\GeneralOptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\GeneralOption\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateGeneralOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createGeneralOption(CreateGeneralOptionRequest $request)
    {
        $generaloption = Apiato::call('GeneralOption@CreateGeneralOptionAction', [$request]);

        $this->uploadMedia( $generaloption, "image", true );
        $this->uploadMedia( $generaloption, "gallery" );
        $this->uploadMedia( $generaloption, "file" );

        return $this->created($this->transform($generaloption, GeneralOptionTransformer::class));
    }

    /**
     * @param FindGeneralOptionByIdRequest $request
     * @return array
     */
    public function findGeneralOptionById(FindGeneralOptionByIdRequest $request)
    {
        $generaloption = Apiato::call('GeneralOption@FindGeneralOptionByIdAction', [$request]);

        return $this->transform($generaloption, GeneralOptionTransformer::class);
    }

    /**
     * @param GetAllGeneralOptionsRequest $request
     * @return array
     */
    public function getAllGeneralOptions(GetAllGeneralOptionsRequest $request)
    {
        $generaloptions = Apiato::call('GeneralOption@GetAllGeneralOptionsAction', [$request]);

        return $this->transform($generaloptions, GeneralOptionTransformer::class);
    }

    /**
     * @param UpdateGeneralOptionRequest $request
     * @return array
     */
    public function updateGeneralOption(UpdateGeneralOptionRequest $request)
    {
        $generaloption = Apiato::call('GeneralOption@UpdateGeneralOptionAction', [$request]);

        $this->uploadMedia( $generaloption, "image", true );
        $this->uploadMedia( $generaloption, "gallery" );
        $this->uploadMedia( $generaloption, "file" );

        return $this->transform($generaloption, GeneralOptionTransformer::class);
    }

    /**
     * @param DeleteGeneralOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGeneralOption(DeleteGeneralOptionRequest $request)
    {
        Apiato::call('GeneralOption@DeleteGeneralOptionAction', [$request]);

        return $this->noContent();
    }
}
