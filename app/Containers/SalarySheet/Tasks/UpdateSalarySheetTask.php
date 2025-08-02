<?php

namespace App\Containers\SalarySheet\Tasks;

use App\Containers\SalarySheet\Data\Repositories\SalarySheetRepository;
use App\Containers\SalarySheet\Models\SalarySheet;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSalarySheetTask extends Task
{

  protected $repository;

  public function __construct(SalarySheetRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {
    // Request from inline edit
    if (isset($data['inlineEdit'])) {
      $item = $this->repository->find($id);
      // When set basic salary, calculate per day
      if (isset($data['basic_salary'])) {
        $data['per_day'] = $data['basic_salary'] / $item->monthly_days;
      }

      if (isset($data['total_sales'])) {
        $data['basic_salary'] = 100;

        // When set total sales, calculate commission
        $data['commission'] = $this->calculateCommission($data, $item);
      }

      if(isset($data['working_days'])) {
        if($item->total_sales < 500) {
          // When set working days, calculate salary per day
          $per_day = $item->basic_salary / $item->monthly_days;
          $data['per_day'] = $per_day;

          $real_salary = $per_day * $data['working_days'];
          $data['absent'] = round($item->basic_salary - $real_salary);
        }else{
          $data['absent'] = 0;
        }
      }

      // When set any of the following fields, calculate gross salary (adds and subtracts)
      $data['gross_salary'] = $this->calculateGrossSalary($data, $item);

      // When set any of the following fields, calculate total deductions (adds and subtracts)
      $data['total_deductions'] = $this->calculateTotalDeductions($data, $item);

      // When set gross salary or total deductions, calculate net salary
      $gross_salary = $data['gross_salary'] ?? $item->gross_salary;
      $total_deductions = $data['total_deductions'] ?? $item->total_deductions;
      $data['net_salary'] = $gross_salary - $total_deductions;

      // When set paid salary, calculate relay
      $net_salary = $data['net_salary'] ?? $item->net_salary;
//      if (!isset($data['paid_salary'])) {
//        $data['paid_salary'] = $net_salary;
//      }

      $paid_salary = $data['paid_salary'] ?? $item->paid_salary;
      $data['relay'] = $net_salary - $paid_salary;

      if(isset($data['paid_salary'])) {
        $next_month = $item->month + 1;
        $next_year = $item->year;

        if($next_month > 12) {
          $next_month = 1;
          $next_year++;
        }

        $next_month_salary = SalarySheet::where('year', $next_year)->where('month', $next_month)->where('employee_id', $item->employee_id);

        if($next_month_salary && $next_month_salary->count() > 0) {
          $next_month_salary = $next_month_salary->first();
          $next_month_salary->previous_due = $data['relay'];
          $next_month_salary->gross_salary = $this->calculateGrossSalary($next_month_salary, $next_month_salary);
          $next_month_salary->total_deductions = $this->calculateTotalDeductions($next_month_salary, $next_month_salary);
          $next_month_salary->net_salary = $next_month_salary->gross_salary - $next_month_salary->total_deductions;
          $next_month_salary->save();
        }
      }
    }

    return $this->repository->update($data, $id);
  }

  function calculateCommission($data, $item) {
    // Rules: if total_sales = 500 add 50 to commission, and for each 10 extra in total_sales add 3 to commission
    // Example: total_sales = 510, commission = 50 + 3 = 53
    // add 3 for each 10 extra in total_sales and if less than 10, ignore
    $commission = 0;
    $total_sales = $data['total_sales'] ?? $item->total_sales;
    if ($total_sales >= 500) {
      $commission = 50;
      $extra = $total_sales - 500;
      $commission += floor($extra / 10) * 3;
    }

    return $commission;
  }

  function calculateGrossSalary($data, $item)
  {
    $gross_salary = 0;
    $gross_salary += $data['basic_salary'] ?? $item->basic_salary;
    $gross_salary += $data['commission'] ?? $item->commission;
    $gross_salary += $data['previous_due'] ?? $item->previous_due;
    $gross_salary += $data['tips'] ?? $item->tips;
    $gross_salary += $data['incentive'] ?? $item->incentive;
    $gross_salary += $data['housing'] ?? $item->housing;
    $gross_salary += $data['transport'] ?? $item->transport;
    $gross_salary += $data['medical'] ?? $item->medical;
    $gross_salary += $data['bonus'] ?? $item->bonus;
    $gross_salary += $data['mobile'] ?? $item->mobile;
    $gross_salary += $data['food'] ?? $item->food;
    $gross_salary += $data['travelling'] ?? $item->travelling;

    return $gross_salary;
  }

  function calculateTotalDeductions($data, $item)
  {
    $total_deductions = 0;
    $total_deductions += $data['ticket_d'] ?? $item->ticket_d;
    $total_deductions += $data['housing_d'] ?? $item->housing_d;
    $total_deductions += $data['transport_d'] ?? $item->transport_d;
    $total_deductions += $data['mobile_d'] ?? $item->mobile_d;
    $total_deductions += $data['loan'] ?? $item->loan;
    $total_deductions += $data['absent'] ?? $item->absent;
    $total_deductions += $data['advance'] ?? $item->advance;
    $total_deductions += $data['sick_leave'] ?? $item->sick_leave;
    $total_deductions += $data['penalty'] ?? $item->penalty;

    return $total_deductions;
  }
}

