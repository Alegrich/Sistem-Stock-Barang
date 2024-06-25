<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;


class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return response()->json($stocks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'type' => 'required|in:in,out',
        ]);

        $stock = Stock::create($request->all());
        return response()->json($stock, 201);
    }

    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        return response()->json($stock);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer',
            'type' => 'sometimes|in:in,out',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($request->all());
        return response()->json($stock);
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return response()->json(null, 204);
    }

}
