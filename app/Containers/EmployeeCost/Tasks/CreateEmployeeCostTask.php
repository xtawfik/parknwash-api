<?php

namespace App\Containers\EmployeeCost\Tasks;

use App\Containers\Employee\Models\Employee;
use App\Containers\EmployeeCost\Data\Repositories\EmployeeCostRepository;
use App\Containers\EmployeeCost\Models\EmployeeCost;
use App\Containers\EmployeeExpense\Models\EmployeeExpense;
use App\Containers\SalarySheet\Models\SalarySheet;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeCostTask extends Task
{

  protected $repository;

  public function __construct(EmployeeCostRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {
    $isTest = false;

    $year = $data['year'];
    $month = $data['month'];

    $checker = EmployeeCost::where('year', $year)->where('month', $month);
    if ($checker && $checker->count() > 0) {
      if ($isTest) {
        $checker->delete();
      } else {
        if (isset($data['employee_id'])) {
          $checker = $checker->where('employee_id', $data['employee_id']);
          if ($checker && $checker->count() > 0) {
            throw new CreateResourceFailedException('Employee Cost for this employee already exists.');
          }
        } else {
          throw new CreateResourceFailedException('Employee Cost for this month already exists.');
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
        ];
      });

    foreach ($employees as $key => $employee) {
      // FOR TESTING PURPOSES LIMIT THE NUMBER OF EMPLOYEES TO 5 (by index)
      if ($key == 5 && $isTest) {
        break;
      }

      // Get employee expenses for this month and year (compare to date)
      $month = str_pad($month, 2, '0', STR_PAD_LEFT);

      // For 1 to 38 set $data['EC01'] to $data['EC38'] to 0
      for ($i = 1; $i <= 41; $i++) {
        $data['EC' . str_pad($i, 2, '0', STR_PAD_LEFT)] = 0;
      }

      $data['total'] = 0;

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

      $repository = $this->repository->create($data);
    }

    return $repository;
  }
}

