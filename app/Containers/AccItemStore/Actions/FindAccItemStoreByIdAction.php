<?php

namespace App\Containers\AccItemStore\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccItemStoreByIdAction extends Action
{
    public function run(Request $request)
    {
        $accitemstore = Apiato::call('AccItemStore@FindAccItemStoreByIdTask', [$request->id]);

        return $accitemstore;
    }
}
