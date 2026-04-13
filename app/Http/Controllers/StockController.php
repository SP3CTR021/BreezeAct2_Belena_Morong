<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with(['product', 'supplier'])->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products  = Product::all();
        $suppliers = Supplier::all();
        return view('stocks.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'  => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity'    => 'required|integer|min:1',
            'stock_date'  => 'required|date',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully.');
    }

    public function edit(Stock $stock)
    {
        $products  = Product::all();
        $suppliers = Supplier::all();
        return view('stocks.edit', compact('stock', 'products', 'suppliers'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'product_id'  => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity'    => 'required|integer|min:1',
            'stock_date'  => 'required|date',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}