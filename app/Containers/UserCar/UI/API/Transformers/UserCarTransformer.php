<?php

namespace App\Containers\UserCar\UI\API\Transformers;

use App\Containers\CarModel\UI\API\Transformers\CarModelTransformer;
use App\Containers\UserCar\Models\UserCar;
use App\Ship\Parents\Transformers\Transformer;

#use#

class UserCarTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
      'car_model'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        #available_includes#
    ];

    /**
     * @param UserCar $entity
     *
     * @return array
     */
    public function transform(UserCar $entity)
    {
        $response = [
            'object' => 'UserCar',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        // Get values of fillables
        $response = $this->fillables( $entity, $response );

        $response = $this->withMedia( $entity, $response, "image" );
        $response = $this->withMedia( $entity, $response, "gallery" );
        $response = $this->withMedia( $entity, $response, "file" );

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCarModel( UserCar $entity ) {
      return $this->item( $entity->carModel, new CarModelTransformer() );
    }
}
