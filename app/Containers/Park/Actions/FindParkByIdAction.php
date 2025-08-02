<?php

namespace App\Containers\Park\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindParkByIdAction extends Action
{
    public function run(Request $request)
    {
        $park = Apiato::call('Park@FindParkByIdTask', [$request->id]);

        return $park;
    }
}
