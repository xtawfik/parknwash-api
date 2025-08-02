<?php

namespace App\Containers\AccFooter\UI\API\Transformers;

use App\Containers\AccFooter\Models\AccFooter;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccFooterCategory\UI\API\Transformers\AccFooterCategoryTransformer;


class AccFooterTransformer extends Transformer
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
        'footer_category',

    ];

    /**
     * @param AccFooter $entity
     *
     * @return array
     */
    public function transform(AccFooter $entity)
    {
        $response = [
            'object' => 'AccFooter',
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

    	public function includeFooterCategory( AccFooter $item ) {
		return $this->item( $item->footer_category, new AccFooterCategoryTransformer() );
	}


}
