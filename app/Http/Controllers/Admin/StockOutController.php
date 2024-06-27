<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StockOut; // Pastikan memanggil model StockOut yang benar

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
        $validatedData = $request->validate([
            'id_items' => 'required|string|max:255',
            'id_suppliers' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create new stock out record
        $stockOut = StockOut::create([
            'id_items' => $validatedData['id_items'],
            'id_suppliers' => $validatedData['id_suppliers'],
            'quantity' => $validatedData['quantity'],
        ]);

        // Update product quantity
        $product = $stockOut; // Assuming $stockOut is the product instance
        $product->quantity -= $validatedData['quantity'];
        $product->save();

        return redirect()->route('admin.stockout.index');
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
