<?php

namespace App\Containers\AccInventoryItem\UI\API\Transformers;

use App\Containers\AccInventoryItem\Models\AccInventoryItem;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccInventoryItemAmount\UI\API\Transformers\AccInventoryItemAmountTransformer;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Containers\AccDivision\UI\API\Transformers\AccDivisionTransformer;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Containers\AccTaxCode\UI\API\Transformers\AccTaxCodeTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class AccInventoryItemTransformer extends Transformer
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
    'amounts',
    'inventories',
    'division',
    'place',
    'division_place',
    'control_account',
    'income_account',
    'expense_account',
    'tax_code',
    'sales_division',
    'sales_division_place',
    'sales_place',
    'user',
    'inventories',

  ];

  /**
   * @param AccInventoryItem $entity
   *
   * @return array
   */
  public function transform(AccInventoryItem $entity)
  {
    $response = [
      'object' => 'AccInventoryItem',
      'id' => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,

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

  public function includeAmounts(AccInventoryItem $item)
  {
    return $this->collection($item->amounts, new AccInventoryItemAmountTransformer());
  }

  public function includeInventories(AccInventoryItem $item)
  {
    return $this->collection($item->inventories, new AccInventoryTransformer());
  }

  public function includeDivision(AccInventoryItem $item)
  {
    return $this->item($item->division, new AccDivisionTransformer());
  }

  public function includePlace(AccInventoryItem $item)
  {
    return $this->item($item->place, new AccPlaceTransformer());
  }

  public function includeDivisionPlace(AccInventoryItem $item)
  {
    return $this->item($item->division_place, new AccDivisionPlaceTransformer());
  }

  public function includeControlAccount(AccInventoryItem $item)
  {
    return $this->item($item->control_account, new AccControlAccountTransformer());
  }

  public function includeIncomeAccount(AccInventoryItem $item)
  {
    return $this->item($item->income_account, new AccProfitLossAccountTransformer());
  }

  public function includeExpenseAccount(AccInventoryItem $item)
  {
    return $this->item($item->expense_account, new AccProfitLossAccountTransformer());
  }

  public function includeTaxCode(AccInventoryItem $item)
  {
    return $this->item($item->tax_code, new AccTaxCodeTransformer());
  }

  public function includeSalesDivision(AccInventoryItem $item)
  {
    return $this->item($item->sales_division, new AccDivisionTransformer());
  }

  public function includeSalesDivisionPlace(AccInventoryItem $item)
  {
    return $this->item($item->sales_division_place, new AccDivisionPlaceTransformer());
  }

  public function includeSalesPlace(AccInventoryItem $item)
  {
    return $this->item($item->sales_place, new AccPlaceTransformer());
  }

  public function includeUser(AccInventoryItem $item)
  {
    return $this->item($item->user, new UserTransformer());
  }


}
