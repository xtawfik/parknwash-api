<?php

namespace App\Containers\EmployeeCost\UI\API\Controllers;

use App\Containers\EmployeeCost\UI\API\Requests\CreateEmployeeCostRequest;
use App\Containers\EmployeeCost\UI\API\Requests\DeleteEmployeeCostRequest;
use App\Containers\EmployeeCost\UI\API\Requests\GetAllEmployeeCostsRequest;
use App\Containers\EmployeeCost\UI\API\Requests\FindEmployeeCostByIdRequest;
use App\Containers\EmployeeCost\UI\API\Requests\UpdateEmployeeCostRequest;
use App\Containers\EmployeeCost\UI\API\Transformers\EmployeeCostTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EmployeeCost\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEmployeeCostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEmployeeCost(CreateEmployeeCostRequest $request)
    {
        $employeecost = Apiato::call('EmployeeCost@CreateEmployeeCostAction', [$request]);

        $this->uploadMedia( $employeecost, "image", true );
        $this->uploadMedia( $employeecost, "gallery" );
        $this->uploadMedia( $employeecost, "file" );

        return $this->created($this->transform($employeecost, EmployeeCostTransformer::class));
    }

    /**
     * @param FindEmployeeCostByIdRequest $request
     * @return array
     */
    public function findEmployeeCostById(FindEmployeeCostByIdRequest $request)
    {
        $employeecost = Apiato::call('EmployeeCost@FindEmployeeCostByIdAction', [$request]);

        return $this->transform($employeecost, EmployeeCostTransformer::class);
    }

    /**
     * @param GetAllEmployeeCostsRequest $request
     * @return array
     */
    public function getAllEmployeeCosts(GetAllEmployeeCostsRequest $request)
    {
        $employeecosts = Apiato::call('EmployeeCost@GetAllEmployeeCostsAction', [$request]);

        return $this->transform($employeecosts, EmployeeCostTransformer::class);
    }

    /**
     * @param UpdateEmployeeCostRequest $request
     * @return array
     */
    public function updateEmployeeCost(UpdateEmployeeCostRequest $request)
    {
        $employeecost = Apiato::call('EmployeeCost@UpdateEmployeeCostAction', [$request]);

        $this->uploadMedia( $employeecost, "image", true );
        $this->uploadMedia( $employeecost, "gallery" );
        $this->uploadMedia( $employeecost, "file" );

        return $this->transform($employeecost, EmployeeCostTransformer::class);
    }

    /**
     * @param DeleteEmployeeCostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmployeeCost(DeleteEmployeeCostRequest $request)
    {
        Apiato::call('EmployeeCost@DeleteEmployeeCostAction', [$request]);

        return $this->noContent();
    }
}
