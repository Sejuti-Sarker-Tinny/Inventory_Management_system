@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Invoice</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('insert.invoice') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="customer_name">Customer Name</label>
                                        <select id="customer_name" name="customer_name" class="form-control">
                                            <option selected>Choose...</option>
                                            @foreach($customers as $c)
                                                <option value="{{$c->id}}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" id="email">
                                        <!-- Customer Email will be dynamically inserted here -->
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group" id="company">
                                        <!-- Customer Company will be dynamically inserted here -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="address">
                                        <!-- Customer Address will be dynamically inserted here -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="phone">
                                        <!-- Customer Phone will be dynamically inserted here -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="small mb-1" for="item">Product Category</label>
                                      <select id="item" name="item" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($medicalProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->category }}</option>
                                            @endif
                                        @endforeach
                                        @foreach($bookProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->category }}</option>
                                            @endif
                                        @endforeach
                                        @foreach($electronicProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->category }}</option>
                                            @endif
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="small mb-1" for="product_name">Product Name</label>
                                      <select id="product_name" name="product_name" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($medicalProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->name }}</option>
                                            @endif
                                        @endforeach
                                        @foreach($bookProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->name }}</option>
                                            @endif
                                        @endforeach
                                        @foreach($electronicProducts as $row)
                                            @if( $row->stock > 1)
                                                <option>{{ $row->name }}</option>
                                            @endif
                                        @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="price">Price (perUnit)</label>
                                        <input class="form-control py-4" name="price" type="text"  />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="quantity">Quantity</label>
                                        <input class="form-control py-4" name="quantity" type="text"  />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="total">Total Price</label>
                                        <input class="form-control py-4" name="total" type="text"  />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
<script>
$(document).ready(function(){
    $("#customer_name").change(function() {
        var customer_id = $("#customer_name").val(); 
        console.log(customer_id);
        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8000/api/get-customer",
            dataType: 'json',
            data: {
                "id" : customer_id
            },
            success: function(data) {
                console.log(data);
                $("#email").html('<label class="small mb-1" for="email">Customer Email</label>');
                var emailInput = '<input class="form-control py-4" name="customer_mail" value="'+data.customer.email+'" type="text"/>';
                $("#email").append(emailInput);

                $("#company").html('<label class="small mb-1" for="company">Customer Company</label>');
                var companyInput = '<input class="form-control py-4" name="company" value="'+data.customer.company+'" type="text"/>';
                $("#company").append(companyInput);

                $("#phone").html('<label class="small mb-1" for="phone">Customer Phone</label>');
                var phoneInput = '<input class="form-control py-4" name="phone" value="'+data.customer.phone+'" type="text"/>';
                $("#phone").append(phoneInput);

                $("#address").html('<label class="small mb-1" for="address">Customer Address</label>');
                var addressInput = '<input class="form-control py-4" name="address" value="'+data.customer.address+'" type="text"/>';
                $("#address").append(addressInput);
            }
        });
    });
});
</script>
@endsection