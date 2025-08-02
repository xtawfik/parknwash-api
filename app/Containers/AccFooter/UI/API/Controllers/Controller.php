<?php

namespace App\Containers\AccFooter\UI\API\Controllers;

use App\Containers\AccFooter\UI\API\Requests\CreateAccFooterRequest;
use App\Containers\AccFooter\UI\API\Requests\DeleteAccFooterRequest;
use App\Containers\AccFooter\UI\API\Requests\GetAllAccFootersRequest;
use App\Containers\AccFooter\UI\API\Requests\FindAccFooterByIdRequest;
use App\Containers\AccFooter\UI\API\Requests\UpdateAccFooterRequest;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccFooter\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccFooterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccFooter(CreateAccFooterRequest $request)
    {
        $accfooter = Apiato::call('AccFooter@CreateAccFooterAction', [$request]);

        $this->uploadMedia( $accfooter, "image", true );
        $this->uploadMedia( $accfooter, "gallery" );
        $this->uploadMedia( $accfooter, "file" );

        return $this->created($this->transform($accfooter, AccFooterTransformer::class));
    }

    /**
     * @param FindAccFooterByIdRequest $request
     * @return array
     */
    public function findAccFooterById(FindAccFooterByIdRequest $request)
    {
        $accfooter = Apiato::call('AccFooter@FindAccFooterByIdAction', [$request]);

        return $this->transform($accfooter, AccFooterTransformer::class);
    }

    /**
     * @param GetAllAccFootersRequest $request
     * @return array
     */
    public function getAllAccFooters(GetAllAccFootersRequest $request)
    {
        $accfooters = Apiato::call('AccFooter@GetAllAccFootersAction', [$request]);

        return $this->transform($accfooters, AccFooterTransformer::class);
    }

    /**
     * @param UpdateAccFooterRequest $request
     * @return array
     */
    public function updateAccFooter(UpdateAccFooterRequest $request)
    {
        $accfooter = Apiato::call('AccFooter@UpdateAccFooterAction', [$request]);

        $this->uploadMedia( $accfooter, "image", true );
        $this->uploadMedia( $accfooter, "gallery" );
        $this->uploadMedia( $accfooter, "file" );

        return $this->transform($accfooter, AccFooterTransformer::class);
    }

    /**
     * @param DeleteAccFooterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccFooter(DeleteAccFooterRequest $request)
    {
        Apiato::call('AccFooter@DeleteAccFooterAction', [$request]);

        return $this->noContent();
    }
}
