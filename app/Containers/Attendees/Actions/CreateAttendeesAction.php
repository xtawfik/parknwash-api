<?php

namespace App\Containers\Attendees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAttendeesAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $attendees = Apiato::call('Attendees@CreateAttendeesTask', [$data]);

        return $attendees;
    }
}
