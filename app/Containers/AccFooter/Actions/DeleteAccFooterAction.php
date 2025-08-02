<?php

namespace App\Containers\AccFooter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccFooterAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccFooter@DeleteAccFooterTask', [$request->id]);
    }
}
