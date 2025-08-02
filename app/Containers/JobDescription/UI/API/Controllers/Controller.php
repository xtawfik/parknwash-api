<?php

namespace App\Containers\JobDescription\UI\API\Controllers;

use App\Containers\JobDescription\UI\API\Requests\CreateJobDescriptionRequest;
use App\Containers\JobDescription\UI\API\Requests\DeleteJobDescriptionRequest;
use App\Containers\JobDescription\UI\API\Requests\GetAllJobDescriptionsRequest;
use App\Containers\JobDescription\UI\API\Requests\FindJobDescriptionByIdRequest;
use App\Containers\JobDescription\UI\API\Requests\UpdateJobDescriptionRequest;
use App\Containers\JobDescription\UI\API\Transformers\JobDescriptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\JobDescription\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateJobDescriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createJobDescription(CreateJobDescriptionRequest $request)
    {
        $jobdescription = Apiato::call('JobDescription@CreateJobDescriptionAction', [$request]);

        $this->uploadMedia( $jobdescription, "image", true );
        $this->uploadMedia( $jobdescription, "gallery" );
        $this->uploadMedia( $jobdescription, "file" );

        return $this->created($this->transform($jobdescription, JobDescriptionTransformer::class));
    }

    /**
     * @param FindJobDescriptionByIdRequest $request
     * @return array
     */
    public function findJobDescriptionById(FindJobDescriptionByIdRequest $request)
    {
        $jobdescription = Apiato::call('JobDescription@FindJobDescriptionByIdAction', [$request]);

        return $this->transform($jobdescription, JobDescriptionTransformer::class);
    }

    /**
     * @param GetAllJobDescriptionsRequest $request
     * @return array
     */
    public function getAllJobDescriptions(GetAllJobDescriptionsRequest $request)
    {
        $jobdescriptions = Apiato::call('JobDescription@GetAllJobDescriptionsAction', [$request]);

        return $this->transform($jobdescriptions, JobDescriptionTransformer::class);
    }

    /**
     * @param UpdateJobDescriptionRequest $request
     * @return array
     */
    public function updateJobDescription(UpdateJobDescriptionRequest $request)
    {
        $jobdescription = Apiato::call('JobDescription@UpdateJobDescriptionAction', [$request]);

        $this->uploadMedia( $jobdescription, "image", true );
        $this->uploadMedia( $jobdescription, "gallery" );
        $this->uploadMedia( $jobdescription, "file" );

        return $this->transform($jobdescription, JobDescriptionTransformer::class);
    }

    /**
     * @param DeleteJobDescriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteJobDescription(DeleteJobDescriptionRequest $request)
    {
        Apiato::call('JobDescription@DeleteJobDescriptionAction', [$request]);

        return $this->noContent();
    }
}
