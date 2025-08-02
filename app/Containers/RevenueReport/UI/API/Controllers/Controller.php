<?php

namespace App\Containers\RevenueReport\UI\API\Controllers;

use App\Containers\RevenueReport\UI\API\Requests\CreateRevenueReportRequest;
use App\Containers\RevenueReport\UI\API\Requests\DeleteRevenueReportRequest;
use App\Containers\RevenueReport\UI\API\Requests\GetAllRevenueReportsRequest;
use App\Containers\RevenueReport\UI\API\Requests\FindRevenueReportByIdRequest;
use App\Containers\RevenueReport\UI\API\Requests\UpdateRevenueReportRequest;
use App\Containers\RevenueReport\UI\API\Transformers\RevenueReportTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\RevenueReport\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateRevenueReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRevenueReport(CreateRevenueReportRequest $request)
    {
        $revenuereport = Apiato::call('RevenueReport@CreateRevenueReportAction', [$request]);

        $this->uploadMedia( $revenuereport, "image", true );
        $this->uploadMedia( $revenuereport, "gallery" );
        $this->uploadMedia( $revenuereport, "file" );

        return $this->created($this->transform($revenuereport, RevenueReportTransformer::class));
    }

    /**
     * @param FindRevenueReportByIdRequest $request
     * @return array
     */
    public function findRevenueReportById(FindRevenueReportByIdRequest $request)
    {
        $revenuereport = Apiato::call('RevenueReport@FindRevenueReportByIdAction', [$request]);

        return $this->transform($revenuereport, RevenueReportTransformer::class);
    }

    /**
     * @param GetAllRevenueReportsRequest $request
     * @return array
     */
    public function getAllRevenueReports(GetAllRevenueReportsRequest $request)
    {
        $revenuereports = Apiato::call('RevenueReport@GetAllRevenueReportsAction', [$request]);

        return $this->transform($revenuereports, RevenueReportTransformer::class);
    }

    /**
     * @param UpdateRevenueReportRequest $request
     * @return array
     */
    public function updateRevenueReport(UpdateRevenueReportRequest $request)
    {
        $revenuereport = Apiato::call('RevenueReport@UpdateRevenueReportAction', [$request]);

        $this->uploadMedia( $revenuereport, "image", true );
        $this->uploadMedia( $revenuereport, "gallery" );
        $this->uploadMedia( $revenuereport, "file" );

        return $this->transform($revenuereport, RevenueReportTransformer::class);
    }

    /**
     * @param DeleteRevenueReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRevenueReport(DeleteRevenueReportRequest $request)
    {
        Apiato::call('RevenueReport@DeleteRevenueReportAction', [$request]);

        return $this->noContent();
    }
}
