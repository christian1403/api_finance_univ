<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BillingResource;
use App\Http\Resources\BillingCollection;
use App\Http\Resources\ErrorResource;
use App\Models\Billing;
use App\Http\Resources\SuccessResource;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : BillingCollection
    {
        $billings = Billing::with(['user', 'debt'])->get();
        return new BillingCollection($billings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : BillingResource
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'debt_id' => 'required|exists:debts,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'month' => 'required|min:1|max:12|integer',
            'year' => 'required|integer|min:2000',
        ]);

        
        $request->merge(['created_by' => auth()->user()->name]);
        $billing = Billing::create($request->all());
        return new BillingResource($billing);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : BillingResource
    {
        $billing = Billing::with(['user', 'debt'])->findOrFail($id);
        return new BillingResource($billing);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : BillingResource
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'debt_id' => 'required|exists:debts,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'month' => 'required|min:1|max:12|integer',
            'year' => 'required|integer|min:2000',
        ]);

        $billing = Billing::findOrFail($id);
        $billing->update($request->all());
        return new BillingResource($billing);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : SuccessResource
    {
        $billing = Billing::findOrFail($id);
        $billing->delete();
        return new SuccessResource([
            'message' => 'Billing record deleted successfully',
        ]);
    }

    public function userBillings() : BillingCollection
    {
        $billings = Billing::with(['user', 'debt'])
            ->where('user_id', auth()->id())
            ->get();
        
        return new BillingCollection($billings);

    }
}
