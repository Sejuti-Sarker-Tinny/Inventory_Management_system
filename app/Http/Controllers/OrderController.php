<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MedicalProduct;
use App\Models\BookProduct;
use App\Models\ElectronicProduct;
use App\Models\Customer;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        // Fetch the product name from the respective product table
        $productName = $this->getProductName($request->code);

        $data = new Order;
        $data->email = $request->email;
        $data->product_code = $request->code;
        $data->product_name = $productName;
        $data->quantity = $request->quantity;
        $data->order_status = 0;
        $data->save();

        return Redirect()->route('all.orders');
    }

    public function newStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'company' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        // Fetch the product name from the respective product table
        $productName = $this->getProductName($request->code);

        $data = new Order;
        $data->email = $request->email;
        $data->product_code = $request->code;
        $data->product_name = $productName;
        $data->quantity = $request->quantity;
        $data->order_status = 0;
        $data->save();

        //customer_track
        $customer = Customer::where('email', '=', $request->email)->first();
        if ($customer === null) {
            $data3 = new Customer;
            $data3->name = $request->name;
            $data3->email = $request->email;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->phone = $request->phone;
            $data3->save();
        }

        return Redirect()->route('all.orders');
    }

    private function getProductName($productCode)
    {
        // Check in medical products
        $medicalProduct = MedicalProduct::where('product_code', $productCode)->first();
        if ($medicalProduct) {
            return $medicalProduct->name;
        }

        // Check in book products
        $bookProduct = BookProduct::where('product_code', $productCode)->first();
        if ($bookProduct) {
            return $bookProduct->name;
        }

        // Check in electronic products
        $electronicProduct = ElectronicProduct::where('product_code', $productCode)->first();
        if ($electronicProduct) {
            return $electronicProduct->name;
        }

        // If no product is found, return an empty string
        return '';
    }

    public function newformData()
    {
        $medicalProducts = MedicalProduct::where('stock', '>', 1)->get();
        $bookProducts = BookProduct::where('stock', '>', 1)->get();
        $electronicProducts = ElectronicProduct::where('stock', '>', 1)->get();
        $customers = Customer::get();
        return view('Admin.new_order', compact('medicalProducts', 'bookProducts', 'electronicProducts', 'customers'));
    }
    public function formData($id)
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
// ProductController.php

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

    public function ordersData()
    {
        $orders = Order::all();
        return view('Admin.all_orders', compact('orders'));
    }

    public function pendingOrders()
    {
        $orders = Order::where('order_status', '=', '0')->get();
        return view('Admin.pending_orders', compact('orders'));
    }

    public function deliveredOrders()
    {
        $orders = Order::where('order_status', '!=', '0')->get();
        return view('Admin.delivered_orders', compact('orders'));
    }
}