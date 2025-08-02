<?php

namespace App\Containers\AccFooter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccFooterAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accfooter = Apiato::call('AccFooter@UpdateAccFooterTask', [$request->id, $data]);

        return $accfooter;
    }
}
