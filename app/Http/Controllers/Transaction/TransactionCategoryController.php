<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionCategoryController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @param Transaction $transaction
     * @return JsonResource
     */
    public function index(Transaction $transaction)
    {
        $categories = $transaction->product->categories;

        return $this->showAll($categories);
    }
}
