<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tambahkan ini di bagian atas untuk menggunakan Str::upper


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.add_items', compact('add_items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'id_categories' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Generate random SKU
    $sku = Str::upper(Str::random(2)) . '-' . rand(100, 999) . '-' . Str::upper(Str::random(2));

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    // Create new item
    Item::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'sku' => $sku,
        'image' => $imagePath,
        'id_categories' => $validatedData['id_categories'],
    ]);

    // Redirect to items index with success message
    return redirect()->route('admin.items.index')->with('success', 'Item berhasil ditambahkan.');
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

    public function stockIn()
    {
        return view('admin.items.stockIn');
    }

    public function stockOut()
    {
        return view('admin.items.stockOut');
    }
}
