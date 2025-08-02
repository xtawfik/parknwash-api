<?php

namespace App\Containers\Order\UI\API\Transformers;

use App\Containers\CarModel\UI\API\Transformers\CarModelTransformer;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Order\Models\Order;
use App\Containers\OrderCover\UI\API\Transformers\OrderCoverTransformer;
use App\Containers\Park\UI\API\Transformers\ParkTransformer;
use App\Containers\Service\UI\API\Transformers\ServiceTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\UserCar\UI\API\Transformers\UserCarTransformer;
use App\Ship\Parents\Transformers\Transformer;


class OrderTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'service',
    'user',
    'mall',
    'country',
    'park',
    'client',
    'order_covers',
    'employee',
    'car_model',
    'car',

  ];

  /**
   * @param Order $entity
   *
   * @return array
   */
  public function transform( Order $entity ) {
    $response = [
      'object'     => 'Order',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,

      'live' => 'https://parknwash.com/live/live.mp4',

      'test' => auth()->user()->id,
    ];

    // Get values of fillables
    $response = $this->fillables( $entity, $response );

    $response = $this->withMedia( $entity, $response, "image" );
    $response = $this->withMedia( $entity, $response, "gallery" );
    $response = $this->withMedia( $entity, $response, "file" );

    if(request("transform") == "dashboard_orders") {
      $employee = $entity->employee;
      $employee_image = null;
      if($employee) {
        $medias = $employee->getMedia( "image" );
        if ( $medias ) {
          $url = [];
          foreach ($medias as $media) {
            $mediaUrl = $media->getUrl();

            if ( strpos( $mediaUrl, "http" ) === false ) {
              $mediaUrl = "https://{$media->getUrl()}";
            }

            $url[] = str_replace("/app/", "/", $mediaUrl);
          }

          if(count($url) === 1) {
            $url = $url[0];
          }

          $employee_image = $url;
        }
      }

      $extras = [];
      $extras['mall_name'] = $entity->mall ? $entity->mall->name : null;
      $extras['park'] = $entity->park ? $entity->park->park : null;
      $extras['employee_name'] = $employee ? $employee->name_en : null;
      $extras['employee_code'] = $employee ? $employee->employee_code : null;
      $extras['employee_image'] = $employee_image;
      $extras['car_model_name'] = $entity->car_model ? $entity->car_model->name : null;
      $extras['car_model_logo'] = $entity->car_model ? "https://api.parknwash.com/storage/brands/" . $entity->car_model->logo : null;
      $extras['service'] = $entity->service ? $entity->service->service_type->name_en : null;
//      $extras['service_covers'] = $entity->service ? $entity->service->service_covers : null;
      $extras['service_car'] = $entity->service ? $entity->service->car->name_en : null;

      $extras['day'] = $entity->created_at;
      $extras['month'] = $entity->created_at;
      $extras['year'] = $entity->created_at;

      // Staff name
      $extras['staff_name'] = $entity->staff ? $entity->staff->code : null;

      $response = array_merge($response, $extras);
    }

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response );

    return $response;
  }

  public function includeService( Order $item ) {
    return $this->item( $item->service, new ServiceTransformer() );
  }

  public function includeUser( Order $item ) {
    return $this->item( $item->user, new UserTransformer() );
  }

  // Employee
  public function includeEmployee( Order $item ) {
    return $this->item( $item->employee, new EmployeeTransformer() );
  }

  public function includeMall( Order $item ) {
    return $this->item( $item->mall, new MallTransformer() );
  }

  public function includeCountry( Order $item ) {
    return $this->item( $item->country, new CountryTransformer() );
  }

  public function includePark( Order $item ) {
    return $this->item( $item->park, new ParkTransformer() );
  }

  public function includeClient( Order $item ) {
    return $this->item( $item->client, new UserTransformer() );
  }

  public function includeOrderCovers( Order $item ) {
    return $this->collection( $item->order_covers, new OrderCoverTransformer() );
  }

  public function includeCarModel( Order $item ) {
    return $this->item( $item->car_model, new CarModelTransformer() );
  }

  // Car
  public function includeCar( Order $item ) {
    return $this->item( $item->car, new UserCarTransformer() );
  }


}
