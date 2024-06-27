<?php

namespace App\Http\Controllers\Admin;

use App\Models\Items;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemsController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $items = Items::all();
        return view('admin.items.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $categories = Category::all();
        return view('admin.items.add_items', compact('categories'));
    }


    // Store a newly created resource in storage.
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
        Items::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'sku' => $sku,
            'image' => $imagePath,
            'id_categories' => $validatedData['id_categories'],
        ]);

        // Redirect to items index with success message
        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $item = Items::findOrFail($id);
        return view('admin.items.edit_items', compact('item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $item = Items::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'id_categories' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // optional: validasi gambar
        ]);

        if ($request->hasFile('image')) {
            // Menghandle upload gambar baru
            $imagePath = $request->file('image')->store('items', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update data item
        $item->update($validatedData);

        return redirect()->route('items.index')->with('success', 'Items Berhasil di Update.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $item = Items::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }
}
