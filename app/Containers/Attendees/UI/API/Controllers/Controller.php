<?php

namespace App\Containers\Attendees\UI\API\Controllers;

use App\Containers\Attendees\Models\Attendees;
use App\Containers\Attendees\UI\API\Requests\CreateAttendeesRequest;
use App\Containers\Attendees\UI\API\Requests\DeleteAttendeesRequest;
use App\Containers\Attendees\UI\API\Requests\GetAllAttendeesRequest;
use App\Containers\Attendees\UI\API\Requests\FindAttendeesByIdRequest;
use App\Containers\Attendees\UI\API\Requests\UpdateAttendeesRequest;
use App\Containers\Attendees\UI\API\Transformers\AttendeesTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Attendees\UI\API\Controllers
 */
class Controller extends ApiController
{
  /**
   * @param CreateAttendeesRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function createAttendees(CreateAttendeesRequest $request)
  {
    $attendees = Apiato::call('Attendees@CreateAttendeesAction', [$request]);

    $this->uploadMedia($attendees, "image", true);
    $this->uploadMedia($attendees, "gallery");
    $this->uploadMedia($attendees, "file");

    return $this->created($this->transform($attendees, AttendeesTransformer::class));
  }

  /**
   * @param FindAttendeesByIdRequest $request
   * @return array
   */
  public function findAttendeesById(FindAttendeesByIdRequest $request)
  {
    $attendees = Apiato::call('Attendees@FindAttendeesByIdAction', [$request]);

    return $this->transform($attendees, AttendeesTransformer::class);
  }

  /**
   * @param GetAllAttendeesRequest $request
   * @return array
   */
  public function getAllAttendees(GetAllAttendeesRequest $request)
  {
    $attendees = Apiato::call('Attendees@GetAllAttendeesAction', [$request]);

    return $this->transform($attendees, AttendeesTransformer::class);
  }

  /**
   * @param UpdateAttendeesRequest $request
   * @return array
   */
  public function updateAttendees(UpdateAttendeesRequest $request)
  {
    $attendees = Apiato::call('Attendees@UpdateAttendeesAction', [$request]);

    $this->uploadMedia($attendees, "image", true);
    $this->uploadMedia($attendees, "gallery");
    $this->uploadMedia($attendees, "file");

    return $this->transform($attendees, AttendeesTransformer::class);
  }

  /**
   * @param DeleteAttendeesRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteAttendees(DeleteAttendeesRequest $request)
  {
    Apiato::call('Attendees@DeleteAttendeesAction', [$request]);

    return $this->noContent();
  }

  public function getCurrentStatus()
  {
    $employee_id = auth()->user()->id;
    $attendees  =Attendees::where('employee_id', $employee_id)->whereDate('created_at', date('Y-m-d'))
      ->orderBy('id', 'desc')->first();

    return $this->transform($attendees, AttendeesTransformer::class);
  }
}
