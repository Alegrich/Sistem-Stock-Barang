<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Items;

use App\Models\Supplier;

class AdminController extends Controller
{
    public function index()
    {
        $totalSuppliers = Supplier::count();
        $totalItems = Items::count();
        $totalCategories = Category::count();

        return view('admin.dashboard', compact('totalSuppliers', 'totalItems', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
