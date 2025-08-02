<?php

namespace App\Containers\Employee\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\Bank\UI\API\Transformers\BankTransformer;
use App\Containers\Employee\Models\Employee;
use App\Containers\User\Models\User;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\JobDescription\UI\API\Transformers\JobDescriptionTransformer;
use App\Containers\Nationality\UI\API\Transformers\NationalityTransformer;
use Carbon\Carbon;


class EmployeeTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [
    'job_description',
    'real_job_description',
    'nationality',
  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'user',
    'bank'

  ];

  /**
   * @param Employee $entity
   *
   * @return array
   */
  public function transform( Employee $entity ) {
    if(request("requestedBy") == "dropdown") {
      return [
        'id' => $entity->getHashedKey(),
        'name' => $entity->name_en,
      ];
    }

    $user = $entity->user;

    $passport_end_days = $entity->passport_end_date
      ? Carbon::now()->startOfDay()->diffInDays(Carbon::parse($entity->passport_end_date)->startOfDay(), false)
      : null;

    $residence_end_days = $entity->residence_end
      ? Carbon::now()->startOfDay()->diffInDays(Carbon::parse($entity->residence_end)->startOfDay(), false)
      : null;

    $contract_end_days = $entity->contract_end_date
      ? Carbon::now()->startOfDay()->diffInDays(Carbon::parse($entity->contract_end_date)->startOfDay(), false)
      : null;

    $work_duration = $entity->join_date
      ? Carbon::parse($entity->join_date)->diffInDays(Carbon::now(), false)
      : null;

    $response = [
      'object'     => 'Employee',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,
      'expense'    => $entity->expense,
      'passport_end_days' => $passport_end_days,
      'residence_end_days' => $residence_end_days,
      'contract_end_days' => $contract_end_days,
      'work_duration' => $work_duration,
      'age' => $entity->birthdate ? Carbon::parse($entity->birthdate)->age : null,
    ];

    // Get values of fillables
    $response = $this->fillables( $entity, $response );

    if ( $user ) {
      $response['mall_id']    = $user->mall_id;
      $response['country_id'] = $user->country_id;
      $response['area_id']    = $user->area_id;
    }

    $response = $this->withMedia( $entity, $response, "image" );
    $response = $this->withMedia( $entity, $response, "gallery" );
    $response = $this->withMedia( $entity, $response, "file" );

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response );

    return $response;
  }

  public function includeUser( Employee $item ) {
    return $this->item( $item->user, new UserTransformer() );
  }

  public function includeRoles( Employee $item ) {
    return $this->collection( $item->user->roles, new RoleTransformer() );
  }

  public function includeJobDescription( Employee $item ) {
    return $this->item( $item->job_description, new JobDescriptionTransformer() );
  }

  public function includeRealJobDescription( Employee $item ) {
    return $this->item( $item->real_job_description, new JobDescriptionTransformer() );
  }

  public function includeNationality( Employee $item ) {
    return $this->item( $item->nationality, new NationalityTransformer() );
  }

  public function includeBank( Employee $item ) {
    return $this->item( $item->bank, new BankTransformer() );
  }


}
