<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(protected TransactionRepository $transactionRepository) {}
    /**
     * Show the form for creating a new resource.
     */
    public function store(TransactionRequest $request, int $userId)
    {
        $credentials = $request->validated();

        return $this->transactionRepository->create($userId, $credentials);
    }
}
