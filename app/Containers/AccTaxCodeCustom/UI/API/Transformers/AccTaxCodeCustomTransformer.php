<?php

namespace App\Containers\AccTaxCodeCustom\UI\API\Transformers;

use App\Containers\AccTaxCodeCustom\Models\AccTaxCodeCustom;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;


class AccTaxCodeCustomTransformer extends Transformer
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
'balance_sheet_account',
'tax_code',

    ];

    /**
     * @param AccTaxCodeCustom $entity
     *
     * @return array
     */
    public function transform(AccTaxCodeCustom $entity)
    {
        $response = [
            'object' => 'AccTaxCodeCustom',
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

    	public function includeUser( AccTaxCodeCustom $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeBalanceSheetAccount( AccTaxCodeCustom $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeTaxCode( AccTaxCodeCustom $item ) {
		return $this->item( $item->tax_code, new AccTaxCodeTransformer() );
	}


}
