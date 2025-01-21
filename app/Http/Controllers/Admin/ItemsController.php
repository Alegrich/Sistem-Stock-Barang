<?php

namespace App\Http\Controllers\Admin;

use App\Models\Items;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $items)
    {
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
        $items->update($validatedData);

        return redirect()->route('admin.items.index')->with('success', 'Items Berhasil di Update.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
