<?php

namespace App\Containers\Nationality\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateNationalityAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $nationality = Apiato::call('Nationality@UpdateNationalityTask', [$request->id, $data]);

        return $nationality;
    }
}
