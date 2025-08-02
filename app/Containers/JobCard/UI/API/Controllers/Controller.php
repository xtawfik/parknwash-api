<?php

namespace App\Containers\JobCard\UI\API\Controllers;

use App\Containers\JobCard\UI\API\Requests\CreateJobCardRequest;
use App\Containers\JobCard\UI\API\Requests\DeleteJobCardRequest;
use App\Containers\JobCard\UI\API\Requests\GetAllJobCardsRequest;
use App\Containers\JobCard\UI\API\Requests\FindJobCardByIdRequest;
use App\Containers\JobCard\UI\API\Requests\UpdateJobCardRequest;
use App\Containers\JobCard\UI\API\Transformers\JobCardTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\JobCard\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateJobCardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createJobCard(CreateJobCardRequest $request)
    {
        $jobcard = Apiato::call('JobCard@CreateJobCardAction', [$request]);

        $this->uploadMedia( $jobcard, "image", true );
        $this->uploadMedia( $jobcard, "gallery" );
        $this->uploadMedia( $jobcard, "file" );

        return $this->created($this->transform($jobcard, JobCardTransformer::class));
    }

    /**
     * @param FindJobCardByIdRequest $request
     * @return array
     */
    public function findJobCardById(FindJobCardByIdRequest $request)
    {
        $jobcard = Apiato::call('JobCard@FindJobCardByIdAction', [$request]);

        return $this->transform($jobcard, JobCardTransformer::class);
    }

    /**
     * @param GetAllJobCardsRequest $request
     * @return array
     */
    public function getAllJobCards(GetAllJobCardsRequest $request)
    {
        $jobcards = Apiato::call('JobCard@GetAllJobCardsAction', [$request]);

        return $this->transform($jobcards, JobCardTransformer::class);
    }

    /**
     * @param UpdateJobCardRequest $request
     * @return array
     */
    public function updateJobCard(UpdateJobCardRequest $request)
    {
        $jobcard = Apiato::call('JobCard@UpdateJobCardAction', [$request]);

        $this->uploadMedia( $jobcard, "image", true );
        $this->uploadMedia( $jobcard, "gallery" );
        $this->uploadMedia( $jobcard, "file" );

        return $this->transform($jobcard, JobCardTransformer::class);
    }

    /**
     * @param DeleteJobCardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteJobCard(DeleteJobCardRequest $request)
    {
        Apiato::call('JobCard@DeleteJobCardAction', [$request]);

        return $this->noContent();
    }
}
