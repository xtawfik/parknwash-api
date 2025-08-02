<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task {

  protected $repository;

  public function __construct( UserRepository $repository ) {
    $this->repository = $repository;
  }

  /**
   * @param bool $isClient
   * @param array $data
   *
   * @return  mixed
   */
  public function run(
    array $data,
    bool $isClient = true
  ): User {

    try {
      // create new user
      $user = $this->repository->create( array_merge($data, [
        'password'  => Hash::make( $data['password'] ),
        'is_client' => $isClient,
        // add testing balance
        'balance'   => 100,
      ]) );

    } catch ( Exception $e ) {
      throw ( new CreateResourceFailedException() )->debug( $e );
    }

    return $user;
  }

}
