<?php

namespace App\Containers\Nationality\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindNationalityByIdAction extends Action
{
    public function run(Request $request)
    {
        $nationality = Apiato::call('Nationality@FindNationalityByIdTask', [$request->id]);

        return $nationality;
    }
}
