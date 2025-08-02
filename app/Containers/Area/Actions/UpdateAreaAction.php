<?php

namespace App\Containers\Area\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAreaAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $area = Apiato::call('Area@UpdateAreaTask', [$request->id, $data]);

        return $area;
    }
}
