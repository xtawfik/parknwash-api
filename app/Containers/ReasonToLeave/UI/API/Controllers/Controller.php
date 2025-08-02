<?php

namespace App\Containers\ReasonToLeave\UI\API\Controllers;

use App\Containers\ReasonToLeave\UI\API\Requests\CreateReasonToLeaveRequest;
use App\Containers\ReasonToLeave\UI\API\Requests\DeleteReasonToLeaveRequest;
use App\Containers\ReasonToLeave\UI\API\Requests\GetAllReasonToLeavesRequest;
use App\Containers\ReasonToLeave\UI\API\Requests\FindReasonToLeaveByIdRequest;
use App\Containers\ReasonToLeave\UI\API\Requests\UpdateReasonToLeaveRequest;
use App\Containers\ReasonToLeave\UI\API\Transformers\ReasonToLeaveTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ReasonToLeave\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateReasonToLeaveRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createReasonToLeave(CreateReasonToLeaveRequest $request)
    {
        $reasontoleave = Apiato::call('ReasonToLeave@CreateReasonToLeaveAction', [$request]);

        $this->uploadMedia( $reasontoleave, "image", true );
        $this->uploadMedia( $reasontoleave, "gallery" );
        $this->uploadMedia( $reasontoleave, "file" );

        return $this->created($this->transform($reasontoleave, ReasonToLeaveTransformer::class));
    }

    /**
     * @param FindReasonToLeaveByIdRequest $request
     * @return array
     */
    public function findReasonToLeaveById(FindReasonToLeaveByIdRequest $request)
    {
        $reasontoleave = Apiato::call('ReasonToLeave@FindReasonToLeaveByIdAction', [$request]);

        return $this->transform($reasontoleave, ReasonToLeaveTransformer::class);
    }

    /**
     * @param GetAllReasonToLeavesRequest $request
     * @return array
     */
    public function getAllReasonToLeaves(GetAllReasonToLeavesRequest $request)
    {
        $reasontoleaves = Apiato::call('ReasonToLeave@GetAllReasonToLeavesAction', [$request]);

        return $this->transform($reasontoleaves, ReasonToLeaveTransformer::class);
    }

    /**
     * @param UpdateReasonToLeaveRequest $request
     * @return array
     */
    public function updateReasonToLeave(UpdateReasonToLeaveRequest $request)
    {
        $reasontoleave = Apiato::call('ReasonToLeave@UpdateReasonToLeaveAction', [$request]);

        $this->uploadMedia( $reasontoleave, "image", true );
        $this->uploadMedia( $reasontoleave, "gallery" );
        $this->uploadMedia( $reasontoleave, "file" );

        return $this->transform($reasontoleave, ReasonToLeaveTransformer::class);
    }

    /**
     * @param DeleteReasonToLeaveRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReasonToLeave(DeleteReasonToLeaveRequest $request)
    {
        Apiato::call('ReasonToLeave@DeleteReasonToLeaveAction', [$request]);

        return $this->noContent();
    }
}
