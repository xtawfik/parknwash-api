<?php

namespace App\Containers\Employee\UI\API\Controllers;

use App\Containers\Employee\Models\Employee;
use App\Containers\Employee\UI\API\Requests\CreateEmployeeRequest;
use App\Containers\Employee\UI\API\Requests\DeleteEmployeeRequest;
use App\Containers\Employee\UI\API\Requests\GetAllEmployeesRequest;
use App\Containers\Employee\UI\API\Requests\FindEmployeeByIdRequest;
use App\Containers\Employee\UI\API\Requests\UpdateEmployeeRequest;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Order\Models\Order;
use App\Containers\Request\Models\Request;
use App\Containers\User\Models\User;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @package App\Containers\Employee\UI\API\Controllers
 */
class Controller extends ApiController
{
  /**
   * @param CreateEmployeeRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function createEmployee(CreateEmployeeRequest $request)
  {
    $employee = Apiato::call('Employee@CreateEmployeeAction', [$request]);

    $this->uploadMedia($employee, "image", true);
    $this->uploadMedia($employee, "gallery");
    $this->uploadMedia($employee, "file");

    return $this->created($this->transform($employee, EmployeeTransformer::class));
  }

  /**
   * @param FindEmployeeByIdRequest $request
   * @return array
   */
  public function findEmployeeById(FindEmployeeByIdRequest $request)
  {
    $employee = Apiato::call('Employee@FindEmployeeByIdAction', [$request]);

    return $this->transform($employee, EmployeeTransformer::class);
  }

  /**
   * @param GetAllEmployeesRequest $request
   * @return array
   */
  public function getAllEmployees(GetAllEmployeesRequest $request)
  {
    $employees = Apiato::call('Employee@GetAllEmployeesAction', [$request]);

    return $this->transform($employees, EmployeeTransformer::class);
  }

  /**
   * @param UpdateEmployeeRequest $request
   * @return array
   */
  public function updateEmployee(UpdateEmployeeRequest $request)
  {
    $employee = Apiato::call('Employee@UpdateEmployeeAction', [$request]);

    $this->uploadMedia($employee, "image", true);
    $this->uploadMedia($employee, "gallery");
    $this->uploadMedia($employee, "file");

    return $this->transform($employee, EmployeeTransformer::class);
  }

  /**
   * @param DeleteEmployeeRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteEmployee(DeleteEmployeeRequest $request)
  {
    Apiato::call('Employee@DeleteEmployeeAction', [$request]);

    return $this->noContent();
  }

  public function cloneEmployees()
  {
    // get all users with role employee and is_client = 0
    $users = User::whereHas('roles', function ($query) {
      $query->where('name', 'employee')->orWhere('name', 'supervisor')->orWhere('name', 'areasupervisor');
    })->where('is_client', 0)->get();

    // loop through users and add them to employees table
    foreach ($users as $user) {
      Employee::create([
        "user_id" => $user->id,
        "name_en" => $user->name,
        "email" => $user->email,
        "work_status" => $user->status == "active" ? "working" : "not_working",
      ]);
    }

    return [
      "users" => $users,
      "status" => "DONE"
    ];
  }

  public function fixDuplicates()
  {
    // get all employees
    $employees = Employee::all();

    // loop through employees
    foreach ($employees as $employee) {
      // get all users with the same name include deleted users
      $users = User::withTrashed()->where('name', $employee->name_en)->get();

      if (count($users) == 0) {
        continue;
      }

      // Update employee with the first user
      $employee->update([
        "user_id" => $users[0]->id,
      ]);

      // delete all other users
      foreach ($users as $user) {
        if ($user->id != $users[0]->id) {
          // force delete user
          $user->forceDelete();
        }
      }
    }

    return [
      "status" => "DONE"
    ];
  }

  public function removeMedia(Request $request)
  {
    $id = $request->id;
    $model = "Employee";

  }

  public function getAllEmployeesStats(Request $request)
  {
    $allEmployees = Employee::count();
    $workingEmployees = Employee::where('work_status', 'working')->count();
    $notWorkingEmployees = Employee::where('work_status', 'not_working')->count();

    $male = Employee::where('gender', 'male')->count();
    $female = Employee::where('gender', 'female')->count();
    $notSpecified = Employee::whereNull('gender')->count();

    // Employees grouped by nationality
    $nationalityCounts = Employee::selectRaw('COUNT(*) as count, nationality.country_name_en as nationality_name')
      ->leftJoin('nationality', 'employee.nationality_id', '=', 'nationality.id')
      ->groupBy('nationality.country_name_en')
      ->get()
      ->pluck('count', 'nationality_name')
      ->toArray();

    // Employees grouped by job description
    $jobDescriptionCounts = Employee::selectRaw('COUNT(*) as count, job_description.name_en as job_description_name')
      ->leftJoin('job_description', 'employee.job_description_id', '=', 'job_description.id')
      ->groupBy('job_description.name_en')
      ->get()
      ->pluck('count', 'job_description_name')
      ->toArray();

    // Employees grouped by religion
    $religions = Employee::selectRaw('COUNT(*) as count, employee.religion as religion_name')
      ->groupBy('employee.religion')
      ->get();

    $religionCounts = [];
    foreach ($religions as $religion) {
      $religionCounts[] = $religion->count;
    }

    // Employees grouped by education
    $educations = Employee::selectRaw('COUNT(*) as count, employee.education as education_name')
      ->groupBy('employee.education')
      ->get();

    $educationCounts = [];
    foreach ($educations as $education) {
      $educationCounts[] = $education->count;
    }

    // Most active employees (with most order)
    $mostActiveEmployees = Employee::selectRaw('COUNT(*) as count, employee.name_en as employee_name')
      ->leftJoin('order', 'employee.id', '=', 'order.user_id')
      ->groupBy('employee.name_en')
      ->orderBy('count', 'desc')
      ->limit(10)
      ->get()
      ->pluck('count', 'employee_name')
      ->toArray();

    return [
      "data" => [
        "all" => $allEmployees,
        "working" => $workingEmployees,
        "not_working" => $notWorkingEmployees,
        "male_female" => [$male, $female, $notSpecified],
        "nationality_counts" => $nationalityCounts,
        "job_description_counts" => $jobDescriptionCounts,
        "religion_counts" => $religionCounts,
        "most_active_employees" => $mostActiveEmployees,
        "education_counts" => $educationCounts,
      ]
    ];
  }

  // Get sales stats of the logged in employee
  public function getAllEmployeeSalesStats(Request $request)
  {
    // Get the date from request and convert to Carbon instance
    $date = Carbon::parse(request()->date)->startOfDay();

    // Get logged in user
    $user = Auth::user();

    // Get daily orders count
    $dailyOrders = Order::where('user_id', $user->id)
      ->whereDate('created_at', $date)
      ->whereIn('status', ["completed", "finished"])
      ->count();

    // Get monthly orders count
    $monthlyOrders = Order::where('user_id', $user->id)
      ->whereYear('created_at', $date->year)
      ->whereMonth('created_at', $date->month)
      ->whereIn('status', ["completed", "finished"])
      ->count();

    // Calculate total money earned for the date
    $dailyTotalMoney = Order::where('user_id', $user->id)
      ->whereDate('created_at', $date)
      ->whereIn('status', ["completed", "finished"])
      ->sum('total');

    // Monthly total money
    $monthlyTotalMoney = Order::where('user_id', $user->id)
      ->whereYear('created_at', $date->year)
      ->whereMonth('created_at', $date->month)
      ->whereIn('status', ["completed", "finished"])
      ->sum('total');

    // Set target (commission threshold)
    $target = 500;

    // Calculate commission based on total sales
    $commission = $this->calculateCommission(['total_sales' => $dailyTotalMoney]);

    // Get base salary
    $baseSalary = 100; // Fixed base salary of 100 KWD

    // Add commission to base salary
    $totalSalary = $baseSalary + $commission;

    // Calculate achievement rate
    $rate = 0;

    return [
      'data' => [
        [
          'title' => 'T MONEY',
          'value' => "{$dailyTotalMoney} / {$monthlyTotalMoney}",
        ],
        [
          'title' => 'ORDERS',
          'value' => "{$dailyOrders} / {$monthlyOrders}"
        ],
        [
          'title' => 'TARGET',
          'value' => "{$monthlyTotalMoney} / {$target}",
          'color' => 'red' // For the first number
        ],
        [
          'title' => 'T SALARY',
          'value' => "{$totalSalary} KWD" // Now includes commission
        ],
        [
          'title' => 'COMMISSION',
          'value' => "{$commission} KWD"
        ],
        [
          'title' => 'TOP 10',
          'value' => round($rate, 0) . " / 100",
          'color' => 'green' // For the first number
        ],
      ],
      'date' => $date
    ];
  }

  private function calculateCommission($data, $item = null)
  {
    // Rules: if total_sales = 500 add 50 to commission, and for each 10 extra in total_sales add 3 to commission
    // Example: total_sales = 510, commission = 50 + 3 = 53
    $commission = 0;
    $total_sales = $data['total_sales'] ?? $item->total_sales;

    if ($total_sales >= 500) {
      $commission = 50;
      $extra = $total_sales - 500;
      $commission += floor($extra / 10) * 3;
    }

    return $commission;
  }

  public function checkUserByEmployeeId()
  {
    $employeeId = request()->employee_id;
    $employee = Employee::find($employeeId);
    if (!$employee) {
      return null;
    }

    // Search users by name, email, code, user_id and return the first all
    $users = User::where('name', $employee->name_en)
      ->orWhere('email', $employee->email)
      ->orWhere('email', $employee->phone . "@parknwash.com")
      ->orWhere('code', $employee->employee_code)
      ->orWhere('id', $employee->user_id)
      ->get();

    // Loop through users and add "is_connected" if employee user_id is found
    foreach ($users as $user) {
      $user->is_connected = $user->id == $employee->user_id;
    }

    // If only one user and it's connected, make sure user.code is the same as employee.employee_code
    if (count($users) == 1 && $users[0]->is_connected) {
      $users[0]->code = $employee->employee_code;

      // Update user with employee code
      User::where('id', $users[0]->id)->update([
        "code" => $employee->employee_code,
        "email" => $employee->phone . "@parknwash.com",
        "is_client" => 0,
      ]);

      // Update user role to employee
      $users[0]->syncRoles(['employee']);
    }

    return [
      "data" => $users
    ];
  }

  //usersCreateFromEmployee
  public function usersCreateFromEmployee()
  {
    $employeeId = request()->employee_id;
    $employee = Employee::find($employeeId);
    if (!$employee) {
      return null;
    }

    // Create user from employee
    $user = User::create([
      "name" => $employee->name_en,
      "email" => $employee->phone . "@parknwash.com",
      "code" => $employee->employee_code,
      "is_client" => 0,
      "status" => "active",
    ]);

    // Update employee with user_id
    $employee->update([
      "user_id" => $user->id,
    ]);

    return [
      "data" => $user
    ];
  }

  // usersConnectFromEmployee
  public function usersConnectFromEmployee()
  {
    $employeeId = request()->employee_id;
    $userId = request()->user_id;

    $employee = Employee::find($employeeId);
    $user = User::find($userId);

    if (!$employee || !$user) {
      return null;
    }

    // Update employee with user_id
    $employee->update([
      "user_id" => $user->id,
    ]);

    return [
      "data" => $user
    ];
  }
}
