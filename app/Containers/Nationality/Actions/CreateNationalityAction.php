<?php

namespace App\Containers\Nationality\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateNationalityAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $nationality = Apiato::call('Nationality@CreateNationalityTask', [$data]);

        return $nationality;
    }
}
