<?php

namespace App\Containers\SalarySheet\UI\API\Transformers;

use App\Containers\SalarySheet\Models\SalarySheet;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;


class SalarySheetTransformer extends Transformer
{
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'employee',
    'mall',

  ];

  /**
   * @param SalarySheet $entity
   *
   * @return array
   */
  public function transform(SalarySheet $entity)
  {
    $response = [
      'object' => 'SalarySheet',
      'id' => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,
//      'user_id' => $entity->employee->user_id,

    ];

    // Get values of fillables
    $response = $this->fillables($entity, $response);

    $response = $this->withMedia($entity, $response, "image");
    $response = $this->withMedia($entity, $response, "gallery");
    $response = $this->withMedia($entity, $response, "file");

    $response = $this->ifAdmin([
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response);

    return $response;
  }

  public function includeEmployee(SalarySheet $item)
  {
    return $this->item($item->employee, new EmployeeTransformer());
  }

  public function includeMall(SalarySheet $item)
  {
    return $this->item($item->mall, new MallTransformer());
  }


}
