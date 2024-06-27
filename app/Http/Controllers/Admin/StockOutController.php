<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stockOut.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stockOut.create_stockOut');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_name' => 'required|exists:name,id',
            'id_supplier' => 'required|exists:supplier,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $stockOut = StockOutController::create([
            'id_name' => $request->id_name,
            'id_supplier' => $request->id_supplier,
            'quantity' => $request->quantity,
        ]);

        $product = $stockOut->items;
        $product->quantity -= $request->quantity;
        $product->save();

        return view(route('admin.stockout.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
