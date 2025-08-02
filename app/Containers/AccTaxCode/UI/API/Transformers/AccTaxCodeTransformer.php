<?php

namespace App\Containers\AccTaxCode\UI\API\Transformers;

use App\Containers\AccTaxCode\Models\AccTaxCode;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccTaxCodeCustom\UI\API\Transformers\AccTaxCodeCustomTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccReportingCategory\UI\API\Transformers\AccReportingCategoryTransformer;


class AccTaxCodeTransformer extends Transformer
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
'customs',
'balance_sheet_account',
'net_reporting_category',
'net_reporting_category_reversed',
'amount_reporting_category_reversed',
'amount_reporting_category',

    ];

    /**
     * @param AccTaxCode $entity
     *
     * @return array
     */
    public function transform(AccTaxCode $entity)
    {
        $response = [
            'object' => 'AccTaxCode',
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

    	public function includeUser( AccTaxCode $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCustoms( AccTaxCode $item ) {
		return $this->collection( $item->customs, new AccTaxCodeCustomTransformer() );
	}

	public function includeBalanceSheetAccount( AccTaxCode $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeNetReportingCategory( AccTaxCode $item ) {
		return $this->item( $item->net_reporting_category, new AccReportingCategoryTransformer() );
	}

	public function includeNetReportingCategoryReversed( AccTaxCode $item ) {
		return $this->item( $item->net_reporting_category_reversed, new AccReportingCategoryTransformer() );
	}

	public function includeAmountReportingCategoryReversed( AccTaxCode $item ) {
		return $this->item( $item->amount_reporting_category_reversed, new AccReportingCategoryTransformer() );
	}

	public function includeAmountReportingCategory( AccTaxCode $item ) {
		return $this->item( $item->amount_reporting_category, new AccReportingCategoryTransformer() );
	}


}
