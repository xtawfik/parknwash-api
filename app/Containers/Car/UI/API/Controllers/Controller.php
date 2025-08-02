<?php

namespace App\Containers\Car\UI\API\Controllers;

use App\Containers\Car\UI\API\Requests\CreateCarRequest;
use App\Containers\Car\UI\API\Requests\DeleteCarRequest;
use App\Containers\Car\UI\API\Requests\GetAllCarsRequest;
use App\Containers\Car\UI\API\Requests\FindCarByIdRequest;
use App\Containers\Car\UI\API\Requests\UpdateCarRequest;
use App\Containers\Car\UI\API\Transformers\CarTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Car\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCar(CreateCarRequest $request)
    {
        $car = Apiato::call('Car@CreateCarAction', [$request]);

        $this->uploadMedia( $car, "image", true );
        $this->uploadMedia( $car, "gallery" );
        $this->uploadMedia( $car, "file" );

        return $this->created($this->transform($car, CarTransformer::class));
    }

    /**
     * @param FindCarByIdRequest $request
     * @return array
     */
    public function findCarById(FindCarByIdRequest $request)
    {
        $car = Apiato::call('Car@FindCarByIdAction', [$request]);

        return $this->transform($car, CarTransformer::class);
    }

    /**
     * @param GetAllCarsRequest $request
     * @return array
     */
    public function getAllCars(GetAllCarsRequest $request)
    {
        $cars = Apiato::call('Car@GetAllCarsAction', [$request]);

        return $this->transform($cars, CarTransformer::class);
    }

    /**
     * @param UpdateCarRequest $request
     * @return array
     */
    public function updateCar(UpdateCarRequest $request)
    {
        $car = Apiato::call('Car@UpdateCarAction', [$request]);

        $this->uploadMedia( $car, "image", true );
        $this->uploadMedia( $car, "gallery" );
        $this->uploadMedia( $car, "file" );

        return $this->transform($car, CarTransformer::class);
    }

    /**
     * @param DeleteCarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCar(DeleteCarRequest $request)
    {
        Apiato::call('Car@DeleteCarAction', [$request]);

        return $this->noContent();
    }
}
