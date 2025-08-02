<?php

namespace App\Containers\AccPayslipItemCategory\UI\API\Transformers;

use App\Containers\AccPayslipItemCategory\Models\AccPayslipItemCategory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccPayslipItemCategoryTransformer extends Transformer
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
        'user',

    ];

    /**
     * @param AccPayslipItemCategory $entity
     *
     * @return array
     */
    public function transform(AccPayslipItemCategory $entity)
    {
        $response = [
            'object' => 'AccPayslipItemCategory',
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

    	public function includeUser( AccPayslipItemCategory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}


}
