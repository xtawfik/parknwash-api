<?php

namespace App\Containers\Attendees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAttendeesByIdAction extends Action
{
    public function run(Request $request)
    {
        $attendees = Apiato::call('Attendees@FindAttendeesByIdTask', [$request->id]);

        return $attendees;
    }
}
