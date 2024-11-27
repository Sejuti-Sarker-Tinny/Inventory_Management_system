<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\MedicalProduct;
use App\Models\BookProduct;
use App\Models\ElectronicProduct;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'customer_name' => 'required|string',
            'customer_mail' => 'required|email',
            'company' => 'nullable|string',
            'address' => 'nullable|string',
            'item' => 'required|string',
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
            'payment' => 'required|numeric',
        ]);

        $data = new Invoice;
        $data->customer_name = $request->customer_name;
        $data->customer_mail = $request->customer_mail;
        $data->company = $request->company;
        $data->address = $request->address;
        $data->item = $request->item;
        $data->product_name = $request->product_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->total = $request->total;
        $data->payment = $request->payment;
        $data->due = $request->total - $request->payment;
        $data->save();

        //order_track
        $productCode = $this->getProductCode($request->product_name);
        $data2 = new Order;
        $data2->email = $request->customer_mail;
        $data2->product_code = $productCode;
        $data2->product_name = $request->product_name;
        $data2->quantity = $request->quantity;
        $data2->order_status = 1;
        $data2->save();

        //customer_track
        $customer = Customer::where('email', '=', $request->customer_mail)->first();
        if ($customer === null) {
            $data3 = new Customer;
            $data3->name = $request->customer_name;
            $data3->email = $request->customer_mail;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->save();
        }

        $product = $this->getProductDetails($productCode);
        $mainqty = $product->stock;
        $nowqty = $mainqty - $request->quantity;

        DB::table('products')->where('name', $request->product_name)->update(['stock' => $nowqty]);
        Order::where('email', $request->customer_mail)->update(['order_status' => '1']);

        return view('Admin.invoice_details', compact('data'));
    }

    public function formData($id)
    {
        $order = Order::where('id', $id)->first();
        $customer = Customer::where('email', $order->email)->first();
        $product = $this->getProductDetails($order->product_code);

        return view('Admin.add_invoice', compact('order', 'customer', 'product'));
    }

    public function newformData()
    {
        $medicalProducts = MedicalProduct::where('stock', '>', 1)->get();
        $bookProducts = BookProduct::where('stock', '>', 1)->get();
        $electronicProducts = ElectronicProduct::where('stock', '>', 1)->get();
        $customers = Customer::all();
        return view('Admin.new_invoice', compact('medicalProducts', 'bookProducts', 'electronicProducts', 'customers'));
    }

    public function allInvoices()
    {
        $invoices = Invoice::all();
        return view('Admin.all_invoices', compact('invoices'));
    }

    public function soldProducts()
    {
        $products = Invoice::select('product_name', Invoice::raw("SUM(quantity) as count"))
            ->groupBy(Invoice::raw("product_name"))->get();
        return view('Admin.sold_products', compact('products'));
    }

    public function delete()
    {
        Invoice::truncate();
    }

    private function getProductDetails($productCode)
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

    private function getProductCode($productName)
    {
        // Check in medical products
        $medicalProduct = MedicalProduct::where('name', $productName)->first();
        if ($medicalProduct) {
            return $medicalProduct->product_code;
        }

        // Check in book products
        $bookProduct = BookProduct::where('name', $productName)->first();
        if ($bookProduct) {
            return $bookProduct->product_code;
        }

        // Check in electronic products
        $electronicProduct = ElectronicProduct::where('name', $productName)->first();
        if ($electronicProduct) {
            return $electronicProduct->product_code;
        }

        // If no product is found, return null
        return null;
    }
}