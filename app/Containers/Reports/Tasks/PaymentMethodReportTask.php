<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\PaymentMethod\Data\Repositories\PaymentMethodRepository;
use App\Ship\Parents\Tasks\Task;

class PaymentMethodReportTask extends Task
{

    protected $repository;

    public function __construct(PaymentMethodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
