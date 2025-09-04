<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    // Apply auth middleware in the constructor
    public function __construct()
    {
        $this->middleware(['auth', \App\Http\Middleware\EnsureUserIsAdmin::class]);
    }

    /**
     * Display a listing of currencies.
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new currency.
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created currency in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:currencies,code',
            'name' => 'required|string|max:50',
            'buy_value' => 'required|numeric|min:0',
            'sell_value' => 'required|numeric|min:0',
        ]);

        Currency::create($request->only(['code', 'name', 'buy_value', 'sell_value']));

        return redirect()->route('currencies.index')->with('success', 'Currency added successfully.');
    }

    /**
     * Show the form for editing the specified currency.
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified currency in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:currencies,code,' . $currency->id,
            'name' => 'required|string|max:50',
            'buy_value' => 'required|numeric|min:0',
            'sell_value' => 'required|numeric|min:0',
        ]);

        $currency->update($request->only(['code', 'name', 'buy_value', 'sell_value']));

        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully.');
    }

    /**
     * Remove the specified currency from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully.');
    }
}
