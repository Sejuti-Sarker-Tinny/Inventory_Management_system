@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Product</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/insert-product') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Product Code</label>
                                        <input class="form-control py-4" name="product_code" type="text" placeholder="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Product Name</label>
                                        <input class="form-control py-4" name="name" type="text" placeholder="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Category</label>
                                        <select class="form-control py-4" name="category" required>
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="Medical">Medical</option>
                                            <option value="Books">Books</option>
                                            <option value="Electronics">Electronics</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Stock</label>
                                        <input class="form-control py-4" name="stock" type="number" placeholder="" required />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Buy Price (perUnit)</label>
                                        <input class="form-control py-4" name="unit_price" type="number" step="0.01" placeholder="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Sale Price(perUnit)</label>
                                        <input class="form-control py-4" name="sales_unit_price" type="number" step="0.01" placeholder="" required />
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Gallery</label>
                                        <input name="photo" type="file" />
                                    </div>
                                </div> -->
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

@section('styles')
<style>
    .form-control.py-4 {
        padding: 10px;
        height: auto;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var categorySelect = document.querySelector('select[name="category"]');
        if (categorySelect) {
            console.log('Category select element found:', categorySelect);
            categorySelect.style.display = 'block';
        } else {
            console.error('Category select element not found');
        }
    });
</script>
@endsection