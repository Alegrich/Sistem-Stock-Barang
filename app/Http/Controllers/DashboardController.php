<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard() {
        return view('frontend.admin.admin');
    }

    public function stafDashboard() {
        $totalSuppliers = Supplier::count();
        $totalItems = Item::count();
        $totalCategories = Kategori::count();

        return view('frontend.staff.dashboard', compact('totalSuppliers', 'totalItems', 'totalCategories'));
    }
}
