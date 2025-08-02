<?php

namespace App\Containers\Receipt\Tasks;

use App\Containers\Loan\Models\Loan;
use App\Containers\Receipt\Data\Repositories\ReceiptRepository;
use App\Containers\Transaction\Models\Transaction;
use App\Ship\Parents\Tasks\Task;

class CreateReceiptTask extends Task {

  protected $repository;

  public function __construct( ReceiptRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    // add the amount to the account balance
    if( $data['type'] == 'cash' ) {
      $repository->account()->increment( 'balance', $data['amount'] );
    } else {
      $repository->account()->decrement( 'balance', $data['amount'] );
    }

    // add the transaction
    Transaction::create([
      'account_id' => $data['account_id'],
      'receipt_id' => $repository->id,
      'amount' => $data['amount'],
      'type' => $data['type'],
      'description_en' => "Receipt #{$repository->id}",
      'description_ar' => "سند رقم {$repository->id}",
      'debit' => $data['type'] == 'cash' ? $data['amount'] : 0,
      'credit' => $data['type'] == 'cash' ? 0 : $data['amount'],
      'balance' => $repository->account->balance,
      'date' => $data['date'],
    ]);

    // check for action param
    if( isset( $data['action'] ) ) {
      // loan payment
      if( $data['action'] == 'loan_payment' ) {
        $loan = Loan::find($data['allocate_id']);
        $loan->increment( 'paid', $data['amount'] );
      }
    }

    return $repository;
  }
}

