<?php

namespace App\Containers\AccFooter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccFooterAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accfooter = Apiato::call('AccFooter@CreateAccFooterTask', [$data]);

        return $accfooter;
    }
}
