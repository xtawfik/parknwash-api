<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\Country\Models\Country;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Employee\Models\Employee;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class UserPrivateProfileTransformer.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UserPrivateProfileTransformer extends Transformer {

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'roles',
  ];

  /**
   * @var  array
   */
  protected $defaultIncludes = [
    'country',
    'mall'
  ];

  /**
   * @param \App\Containers\User\Models\User $user
   *
   * @return array
   */
  public function transform( User $user ) {
    $response = [
      'object'    => 'User',
      'id'        => $user->getHashedKey(),
      'name'      => $user->name,
      'email'     => $user->email,
      'confirmed' => $user->confirmed,
      'nickname'  => $user->nickname,
      'gender'    => $user->gender,
      'birth'     => $user->birth,
      'countries' => Country::all(),

      'social_auth_provider' => $user->social_provider,
      'social_id'            => $user->social_id,
      'social_avatar'        => [
        'avatar'   => $user->social_avatar,
        'original' => $user->social_avatar_original,
      ],

      'created_at'          => $user->created_at,
      'updated_at'          => $user->updated_at,
      'readable_created_at' => $user->created_at->diffForHumans(),
      'readable_updated_at' => $user->updated_at->diffForHumans(),
    ];

    $response = $this->fillables( $user, $response );

    $response['balance'] = round( $user->balance, 2 );

    if($user->is_client == 0) {
      $employee = Employee::where('user_id', '=', $user->id)->first();
      if($employee) {
        $response['employee_code'] = $employee->employee_code;
        $response = $this->withMedia( $employee, $response, "image" );

        // Mall location
        if($user->mall_id) {
          $response['mall_id'] = $user->mall_id;
          $response['mall'] = $user->mall;
          $response['mall_location'] = $user->mall->boundaries;
        }
      }
    }else{
      $response = $this->withMedia( $user, $response, "image" );
    }

    $response = $this->ifAdmin( [
      'real_id'    => $user->id,
      'deleted_at' => $user->deleted_at,
    ], $response );

    return $response;
  }

  public function includeRoles( User $user ) {
    return $this->collection( $user->roles, new RoleTransformer() );
  }

  public function includeCountry( User $user ) {
    return $this->item( $user->country, new CountryTransformer() );
  }

  public function includeMall( User $user ) {
    return $this->item( $user->mall, new MallTransformer() );
  }

}
