<?php

namespace App\Containers\Employee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeRepository
 */
class EmployeeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',
'job_description_id' => '=',
'nationality_id' => '=',
'gender' => 'like',
'birthdate' => '=',
'status' => '=',
'email' => 'like',
'phone' => 'like',
'address_en' => 'like',
'address_ar' => 'like',
'employee_code' => 'like',
'join_date' => '=',
'main_salary' => 'like',
'civil_id' => '=',
'national_id' => '=',
'entrance_date' => '=',
'passport_id' => '=',
'residence_at' => '=',
'residence_end' => '=',
'passport_end_date' => '=',
'work_status' => '=',
'bank_id' => '=',
'account_number' => '=',
'beneficiary_name' => 'like',
'iban' => 'like',
'swift' => 'like',

    ];

}
