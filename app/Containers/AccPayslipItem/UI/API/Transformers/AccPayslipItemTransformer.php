<?php

namespace App\Containers\AccPayslipItem\UI\API\Transformers;

use App\Containers\AccPayslipItem\Models\AccPayslipItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccReportingCategory\UI\API\Transformers\AccReportingCategoryTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Containers\AccPayslipItemCategory\UI\API\Transformers\AccPayslipItemCategoryTransformer;


class AccPayslipItemTransformer extends Transformer
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
'reporting_category',
'profit_loss_account',
'balance_sheet_account',
'category',

    ];

    /**
     * @param AccPayslipItem $entity
     *
     * @return array
     */
    public function transform(AccPayslipItem $entity)
    {
        $response = [
            'object' => 'AccPayslipItem',
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

    	public function includeUser( AccPayslipItem $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeReportingCategory( AccPayslipItem $item ) {
		return $this->item( $item->reporting_category, new AccReportingCategoryTransformer() );
	}

	public function includeProfitLossAccount( AccPayslipItem $item ) {
		return $this->item( $item->profit_loss_account, new AccProfitLossAccountTransformer() );
	}

	public function includeBalanceSheetAccount( AccPayslipItem $item ) {
		return $this->item( $item->balance_sheet_account, new AccBalanceSheetAccountTransformer() );
	}

	public function includeCategory( AccPayslipItem $item ) {
		return $this->item( $item->category, new AccPayslipItemCategoryTransformer() );
	}


}
