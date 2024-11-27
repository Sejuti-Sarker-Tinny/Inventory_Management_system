<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalProduct;
use App\Models\BookProduct;
use App\Models\ElectronicProduct;
use App\Models\Order;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $medicalProducts = MedicalProduct::all();
        $bookProducts = BookProduct::all();
        $electronicProducts = ElectronicProduct::all();

        // Merge all products into a single collection
        $products = $medicalProducts->merge($bookProducts)->merge($electronicProducts);

        // Calculate stock, sold products, available products, and pending orders
        $stock = $products->sum('stock');
        $soldProducts = Invoice::sum('quantity');
        $availableProducts = $products->where('stock', '>', 0)->count();
        $pendingOrders = Order::where('order_status', '0')->count();

        return view('dashboard', compact('products', 'stock', 'soldProducts', 'availableProducts', 'pendingOrders'));
    }
}