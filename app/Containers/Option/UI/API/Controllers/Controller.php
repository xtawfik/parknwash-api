<?php

namespace App\Containers\Option\UI\API\Controllers;

use App\Containers\Option\UI\API\Requests\CreateOptionRequest;
use App\Containers\Option\UI\API\Requests\DeleteOptionRequest;
use App\Containers\Option\UI\API\Requests\GetAllOptionsRequest;
use App\Containers\Option\UI\API\Requests\FindOptionByIdRequest;
use App\Containers\Option\UI\API\Requests\UpdateOptionRequest;
use App\Containers\Option\UI\API\Transformers\OptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Option\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOption(CreateOptionRequest $request)
    {
        $option = Apiato::call('Option@CreateOptionAction', [$request]);

        $this->uploadMedia( $option, "image", true );
        $this->uploadMedia( $option, "gallery" );
        $this->uploadMedia( $option, "file" );

        return $this->created($this->transform($option, OptionTransformer::class));
    }

    /**
     * @param FindOptionByIdRequest $request
     * @return array
     */
    public function findOptionById(FindOptionByIdRequest $request)
    {
        $option = Apiato::call('Option@FindOptionByIdAction', [$request]);

        return $this->transform($option, OptionTransformer::class);
    }

    /**
     * @param GetAllOptionsRequest $request
     * @return array
     */
    public function getAllOptions(GetAllOptionsRequest $request)
    {
        $options = Apiato::call('Option@GetAllOptionsAction', [$request]);

        return $this->transform($options, OptionTransformer::class);
    }

    /**
     * @param UpdateOptionRequest $request
     * @return array
     */
    public function updateOption(UpdateOptionRequest $request)
    {
        $option = Apiato::call('Option@UpdateOptionAction', [$request]);

        $this->uploadMedia( $option, "image", true );
        $this->uploadMedia( $option, "gallery" );
        $this->uploadMedia( $option, "file" );

        return $this->transform($option, OptionTransformer::class);
    }

    /**
     * @param DeleteOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOption(DeleteOptionRequest $request)
    {
        Apiato::call('Option@DeleteOptionAction', [$request]);

        return $this->noContent();
    }
}
