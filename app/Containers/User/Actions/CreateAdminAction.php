<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;

/**
 * Class CreateAdminAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateAdminAction extends Action {

  /**
   * @param \App\Ship\Transporters\DataTransporter $data
   *
   * @return  \App\Containers\User\Models\User
   */
  public function run( DataTransporter $data ): User {

    $admin = Apiato::call( 'User@CreateUserByCredentialsTask', [
      request()->all(),
      $isClient = false,
    ] );

    // Update roles
    if(request()->has('roles')) {
      $rolesIds = request('roles');

      $roles = array_map( function ( $roleId ) {
        return Apiato::call( 'Authorization@FindRoleTask', [ $roleId ] );
      }, $rolesIds );

      Apiato::call( 'Authorization@AssignUserToRoleTask', [ $admin, $roles ] );
    }else{
      Apiato::call( 'Authorization@AssignUserToRoleTask', [ $admin, [ 'admin' ] ] );
    }

    return $admin;
  }
}
