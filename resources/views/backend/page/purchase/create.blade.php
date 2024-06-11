@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Add New</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="widget-body">
                            <div class="widget-main">
                                <!-- PURCHASE CREATE FORM -->
                                <form id="product-purchase-form" class="form-horizontal product-purchase-form"
                                    action="{{ route('purchase.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="type" value="Direct">
                                    <div class="row">
                                        <div class="col-md-4 mb-5">
                                            <div class="input-group mb-1 width-100" style="width: 100%">
                                                <span class="input-group-addon" style="width: 40%; text-align: left">
                                                    Supplier<span class="label-required" style="color: red">*</span>
                                                </span>
                                                <select name="supplier_id" id="supplier_id" data-placeholder="- Select -"
                                                    tabindex="1" class="form-control select2" style="width: 100%" required>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-5">
                                            <div class="input-group mb-1 width-100" style="width: 100%">
                                                <span class="input-group-addon" style="width: 40%; text-align: left">
                                                    Warehouse<span class="label-required" style="color: red">*</span>
                                                </span>
                                                <select name="warehouse_id" id="warehouse_id" data-placeholder="- Select -"
                                                    tabindex="2" class="form-control select2" style="width: 100%" required>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-5">
                                            <div class="input-group mb-1 width-100" style="width: 100%">
                                                <span class="input-group-addon" style="width: 40%; text-align: left">
                                                    Date<span class="label-required" style="color: red">*</span>
                                                </span>
                                                <input type="date" class="form-control" name="date" id="date"
                                                    tabindex="3" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Search By Product Name Section -->
                                    <div class="row">
                                        <div class="col-md-12 col-md-offset-4">
                                            <div class="d-flex justify-content-center">
                                                <div class="input-group mb-1" style="width: 32%">
                                                    <span class="input-group-addon width-10" style="text-align: left; background-color: #e1ecff; color: #000000;">
                                                        Search By Product Name <span class="label-required"></span>
                                                    </span>
                                                    <input type="text" id="product_search" class="form-control"
                                                        placeholder="Search for a product..." aria-label="Search for a product">
                                                </div>
                                            </div>

                                            <div id="product_list">
                                                <!-- List of products to search from -->
                                                @foreach ($products as $product)
                                                    <div class="product-item" data-product-id="{{ $product->id }}">
                                                        {{ $product->name }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Search By Product Name Section -->

                                    <!-- Rest of your form goes here -->

                                    <script>
                                      document.addEventListener("DOMContentLoaded", function()  {
                                        const searchBox = document.getElementById('product_search');
                                            const productList = document.getElementById('product_list').getElementsByClassName('product-item');

                                            // Initially hide all product items
                                            Array.from(productList).forEach(function(product) {
                                                product.style.display = 'none';
                                            });

                                            searchBox.addEventListener('input', function() {
                                                const searchTerm = this.value.trim().toLowerCase();

                                                Array.from(productList).forEach(function(product) {

                                                    const productName = product.textContent.toLowerCase();
                                                    if (productName.includes(searchTerm)) {
                                                        product.style.display = 'block';
                                                    } else {
                                                        product.style.display = 'none';
                                                    }
                                                });
                                            });

                                            Array.from(productList).forEach(function(product) {
                                                product.addEventListener('click', function() {
                                                    const productId = this.getAttribute('data-product-id');
                                                    const productName = this.textContent;

                                                    const newRow = `
                                                <tr>
                                                    <td>${productName}<input type="hidden" name="product_id[]" value="${productId}"</td>
                                                    <td class="text-center"><input type="number" name="unit_cost[]" class="form-control unit-cost" required></td>
                                                    <td class="text-center"><input type="number" name="quantity[]" class="form-control quantity" value="1" required></td>
                                                    <td class="text-center total-price">0.00</td>
                                                    <td><input type="text" name="comment[]" class="form-control"></td>
                                                    <td class="text-center"><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                                </tr>`;

                                                    $('#purchaseTable tbody').append(newRow);
                                                    updateTotals();
                                                });

                                            });

                                            $(document).on('click', '.remove-row', function() {
                                                $(this).closest('tr').remove();
                                                updateTotals();
                                            });

                                            $(document).on('click', '.remove-row', function() {
                                                $(this).closest('tr').remove();
                                                updateTotals();
                                            });

                                            $(document).on('input', '.quantity, .unit-cost', function() {
                                                var $row = $(this).closest('tr');
                                                var quantity = $row.find('.quantity').val();
                                                var unitCost = $row.find('.unit-cost').val();
                                                var total = (quantity * unitCost).toFixed(2);
                                                $row.find('.total-price').text(total);
                                                updateTotals();
                                            });

                                            function updateTotals() {
                                                var subtotal = 0;
                                                var totalQuantity = 0;

                                                $('#purchaseTable tbody tr').each(function() {
                                                    var rowTotal = parseFloat($(this).find('.total-price').text());
                                                    var rowQuantity = parseInt($(this).find('.quantity').val());

                                                    subtotal += rowTotal;
                                                    totalQuantity += rowQuantity;
                                                });

                                                $('#subtotal').val(subtotal.toFixed(2));
                                                $('#total_quantity').val(totalQuantity);
                                                $('#payable_amount').val(subtotal.toFixed(2));
                                            }

                                            // New search product logic
                                            $('#searchProductField').on('input', function() {
                                                var query = $(this).val();
                                                if(query.length > 2) {
                                                    // Call your search API
                                                    $.ajax({
                                                        url: '{{ route("product.search") }}', // Replace with your API endpoint
                                                        method: 'GET',
                                                        data: { search: query },
                                                        success: function(data) {
                                                            var dropdown = $('.live-load-content');
                                                            dropdown.empty
                                                            var dropdown = $('.live-load-content');
                                                            dropdown.empty();
                                                            data.forEach(product => {
                                                                dropdown.append(`<div class="dropdown-item" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}">${product.name}</div>`);
                                                            });
                                                            dropdown.show();
                                                        }
                                                    });
                                                } else {
                                                    $('.live-load-content').hide();
                                                }
                                            });

                                            $(document).on('click', '.dropdown-item', function() {
                                                var productId = $(this).data('id');
                                                var productName = $(this).data('name');
                                                var productPrice = $(this).data('price');

                                                $('#product_id').append(`<option value="${productId}" data-price="${productPrice}" selected>${productName}</option>`);
                                                $('#product_id').trigger('change'); // To notify any listeners that the value has changed
                                                $('#searchProductField').val('');
                                                $('.live-load-content').hide();
                                            });
                                        });
                                    </script>
                                        <br>
                                    {{-- <div class="my-2">
                                        <hr>
                                    </div> --}}

                                    <!-- PURCHASE TABLE -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered fixed-table-header" id="purchaseTable">
                                                    <thead>
                                                        <tr class="table-header-bg">
                                                            <th width="22%">Product</th>
                                                            <th width="10%" class="text-center">Unit Cost</th>
                                                            <th width="8%" class="text-center">Qty</th>
                                                            <th width="10%" class="text-center">Total</th>
                                                            <th width="10%">Comment</th>
                                                            <th width="5%" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9"></div>

                                    <div class="col-md-3">
                                        <div class="input-group mb-1 width-100">
                                            <span class="input-group-addon" style="width: 40%; text-align: left">Subtotal</span>
                                            <input type="text" class="form-control text-right subtotal" name="subtotal" id="subtotal" value="{{ old('subtotal') }}" readonly>
                                        </div>
                                        <div class="input-group mb-1 width-100">
                                            <span class="input-group-addon" style="width: 40%; text-align: left">Total Quantity</span>
                                            <input type="text" class="form-control text-right total-quantity" name="total_quantity" id="total_quantity" value="" readonly>
                                        </div>
                                        <div class="input-group mb-1 width-100">
                                            <span class="input-group-addon" style="width: 40%; text-align: left">Total Amount</span>
                                            <input type="text" class="form-control text-right total-amount" name="payable_amount" id="payable_amount" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="btn-group" style="float: right">
                                        <button class="btn btn-sm btn-success" type="submit" onclick="disableButton(this, '.product-purchase-form')"> <i class="fa fa-save"></i> SUBMIT </button>
                                        <a class="btn btn-sm btn-info" href=""> <i class="fa fa-bars"></i> LIST </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
