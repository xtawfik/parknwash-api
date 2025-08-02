<?php

namespace App\Containers\UserCar\UI\API\Controllers;

use App\Containers\UserCar\UI\API\Requests\CreateUserCarRequest;
use App\Containers\UserCar\UI\API\Requests\DeleteUserCarRequest;
use App\Containers\UserCar\UI\API\Requests\GetAllUserCarsRequest;
use App\Containers\UserCar\UI\API\Requests\FindUserCarByIdRequest;
use App\Containers\UserCar\UI\API\Requests\UpdateUserCarRequest;
use App\Containers\UserCar\UI\API\Transformers\UserCarTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\UserCar\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateUserCarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUserCar(CreateUserCarRequest $request)
    {
        $usercar = Apiato::call('UserCar@CreateUserCarAction', [$request]);

        $this->uploadMedia( $usercar, "image", true );
        $this->uploadMedia( $usercar, "gallery" );
        $this->uploadMedia( $usercar, "file" );

        return $this->created($this->transform($usercar, UserCarTransformer::class));
    }

    /**
     * @param FindUserCarByIdRequest $request
     * @return array
     */
    public function findUserCarById(FindUserCarByIdRequest $request)
    {
        $usercar = Apiato::call('UserCar@FindUserCarByIdAction', [$request]);

        return $this->transform($usercar, UserCarTransformer::class);
    }

    /**
     * @param GetAllUserCarsRequest $request
     * @return array
     */
    public function getAllUserCars(GetAllUserCarsRequest $request)
    {
        $usercars = Apiato::call('UserCar@GetAllUserCarsAction', [$request]);

        return $this->transform($usercars, UserCarTransformer::class);
    }

    /**
     * @param UpdateUserCarRequest $request
     * @return array
     */
    public function updateUserCar(UpdateUserCarRequest $request)
    {
        $usercar = Apiato::call('UserCar@UpdateUserCarAction', [$request]);

        $this->uploadMedia( $usercar, "image", true );
        $this->uploadMedia( $usercar, "gallery" );
        $this->uploadMedia( $usercar, "file" );

        return $this->transform($usercar, UserCarTransformer::class);
    }

    /**
     * @param DeleteUserCarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUserCar(DeleteUserCarRequest $request)
    {
        Apiato::call('UserCar@DeleteUserCarAction', [$request]);

        return $this->noContent();
    }
}
