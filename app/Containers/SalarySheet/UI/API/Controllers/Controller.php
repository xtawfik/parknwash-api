<?php

namespace App\Containers\SalarySheet\UI\API\Controllers;

use App\Containers\Order\Models\Order;
use App\Containers\SalarySheet\Models\SalarySheet;
use App\Containers\SalarySheet\UI\API\Requests\CreateSalarySheetRequest;
use App\Containers\SalarySheet\UI\API\Requests\DeleteSalarySheetRequest;
use App\Containers\SalarySheet\UI\API\Requests\GetAllSalarySheetsRequest;
use App\Containers\SalarySheet\UI\API\Requests\FindSalarySheetByIdRequest;
use App\Containers\SalarySheet\UI\API\Requests\UpdateSalarySheetRequest;
use App\Containers\SalarySheet\UI\API\Transformers\SalarySheetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\SalarySheet\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSalarySheetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSalarySheet(CreateSalarySheetRequest $request)
    {
        $salarysheet = Apiato::call('SalarySheet@CreateSalarySheetAction', [$request]);

        $this->uploadMedia( $salarysheet, "image", true );
        $this->uploadMedia( $salarysheet, "gallery" );
        $this->uploadMedia( $salarysheet, "file" );

        return $this->created($this->transform($salarysheet, SalarySheetTransformer::class));
    }

    /**
     * @param FindSalarySheetByIdRequest $request
     * @return array
     */
    public function findSalarySheetById(FindSalarySheetByIdRequest $request)
    {
        $salarysheet = Apiato::call('SalarySheet@FindSalarySheetByIdAction', [$request]);

        return $this->transform($salarysheet, SalarySheetTransformer::class);
    }

    /**
     * @param GetAllSalarySheetsRequest $request
     * @return array
     */
    public function getAllSalarySheets(GetAllSalarySheetsRequest $request)
    {
        $salarysheets = Apiato::call('SalarySheet@GetAllSalarySheetsAction', [$request]);

        return $this->transform($salarysheets, SalarySheetTransformer::class);
    }

    /**
     * @param UpdateSalarySheetRequest $request
     * @return array
     */
    public function updateSalarySheet(UpdateSalarySheetRequest $request)
    {
        $salarysheet = Apiato::call('SalarySheet@UpdateSalarySheetAction', [$request]);

        $this->uploadMedia( $salarysheet, "image", true );
        $this->uploadMedia( $salarysheet, "gallery" );
        $this->uploadMedia( $salarysheet, "file" );

        return $this->transform($salarysheet, SalarySheetTransformer::class);
    }

    /**
     * @param DeleteSalarySheetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSalarySheet(DeleteSalarySheetRequest $request)
    {
        Apiato::call('SalarySheet@DeleteSalarySheetAction', [$request]);

        return $this->noContent();
    }

    public function checkAllSalarySheets() {
      $sheet = SalarySheet::where('month', 7)->where('year', 2024)->get();

      $data = [];
      $total_orders = 0;
      $total_sales = 0;
      $orders_count_total = 0;

      foreach ($sheet as $key => $value) {
        if($value->total_sales == 0) {
          continue;
        }

        // check sales from order table
        $orders = Order::where('user_id', $value->employee->user_id)->whereMonth('created_at', "07")->whereYear('created_at', "2024")->sum('total');

        $orders_count = Order::where('user_id', $value->employee->user_id)->whereMonth('created_at', "07")->whereYear('created_at', "2024")->count();

        $data[] = [
          'id' => $value->id,
          'employee_id' => $value->employee_id,
          'employee_name' => $value->employee_name,
          'employee_code' => $value->employee_code,
          'total_sales' => $value->total_sales,
          'orders' => $orders,
          'orders_count' => $orders_count
        ];

        $total_orders += $orders;
        $total_sales += $value->total_sales;
        $orders_count_total += $orders_count;
      }

      return [
        'total' => count($data),
        'total_orders' => $total_orders,
        'total_sales' => $total_sales,
        'orders_count_total' => $orders_count_total,
        'data' => $data
      ];
    }
}
