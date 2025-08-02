<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAttachmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $attachment = Apiato::call('Attachment@CreateAttachmentTask', [$data]);

        return $attachment;
    }
}
