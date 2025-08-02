<?php

namespace App\Containers\AccProject\UI\API\Controllers;

use App\Containers\AccProject\UI\API\Requests\CreateAccProjectRequest;
use App\Containers\AccProject\UI\API\Requests\DeleteAccProjectRequest;
use App\Containers\AccProject\UI\API\Requests\GetAllAccProjectsRequest;
use App\Containers\AccProject\UI\API\Requests\FindAccProjectByIdRequest;
use App\Containers\AccProject\UI\API\Requests\UpdateAccProjectRequest;
use App\Containers\AccProject\UI\API\Transformers\AccProjectTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccProject\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccProject(CreateAccProjectRequest $request)
    {
        $accproject = Apiato::call('AccProject@CreateAccProjectAction', [$request]);

        $this->uploadMedia( $accproject, "image", true );
        $this->uploadMedia( $accproject, "gallery" );
        $this->uploadMedia( $accproject, "file" );

        return $this->created($this->transform($accproject, AccProjectTransformer::class));
    }

    /**
     * @param FindAccProjectByIdRequest $request
     * @return array
     */
    public function findAccProjectById(FindAccProjectByIdRequest $request)
    {
        $accproject = Apiato::call('AccProject@FindAccProjectByIdAction', [$request]);

        return $this->transform($accproject, AccProjectTransformer::class);
    }

    /**
     * @param GetAllAccProjectsRequest $request
     * @return array
     */
    public function getAllAccProjects(GetAllAccProjectsRequest $request)
    {
        $accprojects = Apiato::call('AccProject@GetAllAccProjectsAction', [$request]);

        return $this->transform($accprojects, AccProjectTransformer::class);
    }

    /**
     * @param UpdateAccProjectRequest $request
     * @return array
     */
    public function updateAccProject(UpdateAccProjectRequest $request)
    {
        $accproject = Apiato::call('AccProject@UpdateAccProjectAction', [$request]);

        $this->uploadMedia( $accproject, "image", true );
        $this->uploadMedia( $accproject, "gallery" );
        $this->uploadMedia( $accproject, "file" );

        return $this->transform($accproject, AccProjectTransformer::class);
    }

    /**
     * @param DeleteAccProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccProject(DeleteAccProjectRequest $request)
    {
        Apiato::call('AccProject@DeleteAccProjectAction', [$request]);

        return $this->noContent();
    }
}
