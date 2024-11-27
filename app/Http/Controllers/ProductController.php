<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalProduct;
use App\Models\BookProduct;
use App\Models\ElectronicProduct;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_code' => 'required|string',
            'name' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
            'sales_unit_price' => 'required|numeric',
        ]);

        // Determine the category and save the product to the respective table
        switch ($request->category) {
            case 'Medical':
                $product = new MedicalProduct;
                break;
            case 'Books':
                $product = new BookProduct;
                break;
            case 'Electronics':
                $product = new ElectronicProduct;
                break;
            default:
                return redirect()->back()->with('error', 'Invalid category');
        }

        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->unit_price = $request->unit_price;
        $product->sales_unit_price = $request->sales_unit_price;
        $product->save();

        return redirect()->route('all.product')->with('success', 'Product added successfully.');
    }

    public function purchaseData($id)
    {
        // Fetch the product based on the ID
        $product = MedicalProduct::find($id);
        if (!$product) {
            $product = BookProduct::find($id);
        }
        if (!$product) {
            $product = ElectronicProduct::find($id);
        }

        if (!$product) {
            // Handle the case where the product is not found
            return redirect()->back()->with('error', 'Product not found');
        }

        return view('Admin.add_order', compact('product'));
    }

    private function getProductDetails($id)
    {
        // Check in medical products
        $medicalProduct = MedicalProduct::find($id);
        if ($medicalProduct) {
            return $medicalProduct;
        }

        // Check in book products
        $bookProduct = BookProduct::find($id);
        if ($bookProduct) {
            return $bookProduct;
        }

        // Check in electronic products
        $electronicProduct = ElectronicProduct::find($id);
        if ($electronicProduct) {
            return $electronicProduct;
        }

        // If no product is found, return null
        return null;
    }

    public function storePurchase(Request $request)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'purchase' => 'required|integer',
        ]);

        // Fetch the product details based on the product code
        $product = $this->getProductDetailsByCode($request->code);

        if ($product) {
            // Update the stock
            $newStock = $product->stock + $request->purchase;
            $product->stock = $newStock;
            $product->save();

            return redirect()->route('all.product')->with('success', 'Product stock updated successfully.');
        } else {
            return redirect()->route('all.product')->with('error', 'Product not found.');
        }
    }

    private function getProductDetailsByCode($productCode)
    {
        // Check in medical products
        $medicalProduct = MedicalProduct::where('product_code', $productCode)->first();
        if ($medicalProduct) {
            return $medicalProduct;
        }

        // Check in book products
        $bookProduct = BookProduct::where('product_code', $productCode)->first();
        if ($bookProduct) {
            return $bookProduct;
        }

        // Check in electronic products
        $electronicProduct = ElectronicProduct::where('product_code', $productCode)->first();
        if ($electronicProduct) {
            return $electronicProduct;
        }

        // If no product is found, return null
        return null;
    }

    public function allProduct()
    {
        $medicalProducts = MedicalProduct::all();
        $bookProducts = BookProduct::all();
        $electronicProducts = ElectronicProduct::all();

        return view('Admin.all_product', compact('medicalProducts', 'bookProducts', 'electronicProducts'));
    }

    public function availableProducts()
    {
        $medicalProducts = MedicalProduct::where('stock', '>', 0)->get();
        $bookProducts = BookProduct::where('stock', '>', 0)->get();
        $electronicProducts = ElectronicProduct::where('stock', '>', 0)->get();

        return view('Admin.available_products', compact('medicalProducts', 'bookProducts', 'electronicProducts'));
    }
}