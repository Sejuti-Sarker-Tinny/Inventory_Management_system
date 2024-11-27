@extends('layouts.admin_master')

@section('content')

<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Create New Invoice</b></h3></div>
    <div class="card-body">
        <form method="POST" action="{{ route('insert.invoice') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="customer_name">Customer Name</label>
                        <input class="form-control py-4" name="customer_name" type="text" value="{{ $customer->name }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="customer_mail">Customer Email</label>
                        <input class="form-control py-4" name="customer_mail" type="text" value="{{ $customer->email }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="company">Company</label>
                        <input class="form-control py-4" name="company" type="text" value="{{ $customer->company }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="address">Address</label>
                        <input class="form-control py-4" name="address" type="text" value="{{ $customer->address }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="item">Product Category</label>
                        <input class="form-control py-4" name="item" type="text" value="{{ $product->category }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="product_name">Product Name</label>
                        <input class="form-control py-4" name="product_name" type="text" value="{{ $product->name }}" />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="price">Price (perUnit)</label>
                        <input class="form-control py-4" name="price" type="text" value="{{ $product->unit_price }}" />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="quantity">Quantity</label>
                        <input class="form-control py-4" name="quantity" type="text" value="{{ $order->quantity }}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="total">Total Price</label>
                        <input class="form-control py-4" name="total" type="text" value="{{ $product->unit_price * $order->quantity }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="payment">Payment</label>
                        <input class="form-control py-4" name="payment" type="text" placeholder="" />
                    </div>
                </div>
            </div>

            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Submit</button></div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</main>

@endsection