<?php

namespace App\Containers\AccFooter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccFooterByIdAction extends Action
{
    public function run(Request $request)
    {
        $accfooter = Apiato::call('AccFooter@FindAccFooterByIdTask', [$request->id]);

        return $accfooter;
    }
}
