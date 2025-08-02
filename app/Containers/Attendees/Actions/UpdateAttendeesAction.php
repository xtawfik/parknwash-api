<?php

namespace App\Containers\Attendees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAttendeesAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $attendees = Apiato::call('Attendees@UpdateAttendeesTask', [$request->id, $data]);

        return $attendees;
    }
}
