<?php

namespace App\Containers\Attendees\Tasks;

use App\Containers\Attendees\Data\Repositories\AttendeesRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateAttendeesTask extends Task
{

  protected $repository;

  public function __construct(AttendeesRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {

    $user = Auth::user();
    $country_id = $user->country ? $user->country->id : 1;
    $mall_id = $user->mall_id;
    $employee_id = $user->id;

    $data['country_id'] = $country_id;
    $data['mall_id'] = $mall_id;
    $data['employee_id'] = $employee_id;

    return $this->repository->create($data);
  }
}

