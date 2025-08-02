<?php

namespace App\Containers\Park\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateParkAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $park = Apiato::call('Park@CreateParkTask', [$data]);

        return $park;
    }
}
