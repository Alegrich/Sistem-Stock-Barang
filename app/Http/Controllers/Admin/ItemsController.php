<?php

namespace App\Http\Controllers\Admin;

use App\Models\Items;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.items.add_items', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_categories' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'qty' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate random SKU
        $sku = Str::upper(Str::random(2)) . '-' . rand(100, 999) . '-' . Str::upper(Str::random(2));

        // Handle file upload
        $imagePath = $request->file('image')
            ? $request->file('image')->store('images', 'public')
            : null;

        // Create new item
        Items::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? '',
            'qty' => $validatedData['qty'] ?? '',
            'SKU' => $sku,
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
        $item = Items::find($id);
        $category = Category::all();
        return view('admin.items.edit_items', compact('item', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'qty' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'id_categories' => 'required|exists:categories,id',
        ]);

        $item = Items::find($id);

        if (!$item) {
            return redirect()->route('admin.items.index')->with('error', 'Item not found');
        }

        // Update data item
        $item->name = $request->name;
        $item->description = $request->description;
        $item->qty = $request->qty;
        $item->id_categories = $request->id_categories;

        // Handle image upload if there's a new image
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($item->image) {
                Storage::delete('public/' . $item->image);
            }

            // Store new image
            $item->image = $request->file('image')->store('images', 'public');
        }

        $item->save();

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Items::find($id);
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Items Berhasil dihapus.');
    }
}
