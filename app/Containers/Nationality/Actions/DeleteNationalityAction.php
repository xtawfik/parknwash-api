<?php

namespace App\Containers\Nationality\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteNationalityAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Nationality@DeleteNationalityTask', [$request->id]);
    }
}
