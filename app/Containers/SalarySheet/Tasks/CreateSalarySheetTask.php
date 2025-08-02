<?php

namespace App\Containers\SalarySheet\Tasks;

use App\Containers\Employee\Models\Employee;
use App\Containers\Order\Models\Order;
use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Containers\SalarySheet\Models\SalarySheet;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSalarySheetTask extends Task
{

  protected $repository;

  public function __construct(SalarySheetRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {
    $isTest = false;

    $year = $data['year'];
    $month = $data['month'];

    $bus_fees = $data['bus_fees'];
    $flat_fees = $data['flat_fees'];

    $checker = SalarySheet::where('year', $year)->where('month', $month);
    if ($checker && $checker->count() > 0) {
      if ($isTest) {
//        $checker->delete();
      } else {
        if (isset($data['employee_id'])) {
          $checker = $checker->where('employee_id', $data['employee_id']);
          if ($checker && $checker->count() > 0) {
            throw new CreateResourceFailedException('Salary Sheet for this employee already exists.');
          }
        }else{
          throw new CreateResourceFailedException('Salary Sheet for this month already exists.');
        }
      }
    }

    // Get all employees
    $employees = Employee::with([
      'nationality' => function ($query) {
        $query->select('id', 'name_en');
      },
      'job_description' => function ($query) {
        $query->select('id', 'name_en');
      }
    ]);

    // Check if employee_id is set
    if (isset($data['employee_id'])) {
      $employees = $employees->where('id', $data['employee_id']);
    }

    $employees = $employees->select([
      'id',
      'user_id',
      'name_en as employee_name',
      'employee_code',
      'civil_id as employee_civil_id',
      'work_status as employee_work_status',
      'nationality_id',
      'job_description_id',
      'join_date as employee_join_date',
      'allowance',
      'cancel_reason as employee_cancel_reason'
    ])
      ->get()
      ->map(function ($employee) {
        // Get employee image
        $medias = $employee->getMedia('image');
        if ($medias) {
          $url = '';
          foreach ($medias as $media) {
            $mediaUrl = $media->getUrl();

            if (strpos($mediaUrl, "http") === false) {
              $mediaUrl = "https://{$media->getUrl()}";
            }

            $url = str_replace("/app/", "/", $mediaUrl);
          }

          $employee->employee_image = $url;
        }
        // Append the related model's name_en if it exists
        return [
          'id' => $employee->id,
          'user_id' => $employee->user_id,
          'employee_name' => $employee->employee_name,
          'employee_code' => $employee->employee_code,
          'employee_civil_id' => $employee->employee_civil_id,
          'employee_work_status' => $employee->employee_work_status,
          'employee_nationality' => optional($employee->nationality)->name_en,
          'employee_job_description' => optional($employee->job_description)->name_en,
          'employee_realjob' => optional($employee->real_job_description)->name_en,
          'employee_image' => $employee->employee_image ?? '',
          'employee_join_date' => $employee->employee_join_date,
          'allowance' => $employee->allowance
        ];
      });

    // Get days of this month in this year
    $month_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Get orders in this month and year
    $all_orders = Order::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();

    // Get total number of employees who have allowance = yes
    $total_allowance = Employee::where('allowance', 'yes')->count();

    foreach ($employees as $key => $employee) {
      // FOR TESTING PURPOSES LIMIT THE NUMBER OF EMPLOYEES TO 5 (by index)
      if ($key == 5 && $isTest) {
        break;
      }

      // Get user id
      $user_id = $employee['user_id'];

      // Get total sales from orders table (where user_id = $user_id) for this month and year
      $total_sales = $all_orders->where('user_id', $user_id)->sum('total');

      // Create a record for each employee
      $data['employee_id'] = $employee['id'];
      $data['employee_image'] = $employee['employee_image'];
      $data['employee_name'] = $employee['employee_name'];
      $data['employee_code'] = $employee['employee_code'];
      $data['employee_nationality'] = $employee['employee_nationality'];
      $data['employee_designation'] = $employee['employee_job_description'];
      $data['employee_civil_id'] = $employee['employee_civil_id'];
      $data['employee_work_status'] = $employee['employee_work_status'];
      $data['employee_join_date'] = $employee['employee_join_date'];
      $data['month'] = $month;
      $data['year'] = $year;
      $data['working_days'] = 0;
      $data['total_sales'] = $total_sales;
      $data['per_day'] = 0;
      $data['basic_salary'] = 0;
      $data['commission'] = 0;
      $data['tips'] = 0;
      $data['incentive'] = 0;
      $data['housing'] = 0;
      $data['transport'] = 0;
      $data['medical'] = 0;
      $data['bonus'] = 0;
      $data['mobile'] = 0;
      $data['food'] = 0;
      $data['travelling'] = 0;
      $data['gross_salary'] = 0;
      $data['ticket_d'] = 0;
      $data['housing_d'] = 0;
      $data['transport_d'] = 0;
      $data['mobile_d'] = 0;
      $data['loan'] = 0;
      $data['absent'] = 0;
      $data['advance'] = 0;
      $data['sick_leave'] = 0;
      $data['penalty'] = 0;
      $data['total_deductions'] = 0;
      $data['net_salary'] = 0;
      $data['paid_salary'] = 0;
      $data['relay'] = 0;
      $data['monthly_days'] = $month_days;
      $data['previous_due'] = 0;

      // Divide the bus fees and flat fees by the total number of employees who have allowance = yes
      if($employee['allowance'] == 'yes') {
        if($bus_fees > 0) {
          $data['transport'] = $bus_fees / $total_allowance;
          $data['transport_d'] = $bus_fees / $total_allowance;
        }

        if($flat_fees > 0) {
          $data['housing'] = $flat_fees / $total_allowance;
          $data['housing_d'] = $flat_fees / $total_allowance;
        }

        $data['total_deductions'] = $data['transport_d'] + $data['housing_d'];
      }


      // Calculate previous due from previous month relays
      $previous_month = $month - 1;
      $previous_year = $year;
      if ($previous_month == 0) {
        $previous_month = 12;
        $previous_year = $year - 1;
      }

      $previous_due = SalarySheet::where('year', $previous_year)->where('month', $previous_month)->where('employee_id', $employee['id'])->sum('relay');

      if($previous_due > 0) {
        $data['previous_due'] = $previous_due;
      }

      $repository = $this->repository->create($data);
    }

    return $repository;
  }
}

