<?php

namespace App\Containers\Attendees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAttendeesAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Attendees@DeleteAttendeesTask', [$request->id]);
    }
}
