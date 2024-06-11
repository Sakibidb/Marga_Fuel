@extends('frontend.home.master')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-6 ">
            <form style='margin:0 auto; ' action="https://sandbox.aamarpay.com/index.php" method="post" name="form1">
                <input type="hidden" name="tran_id" value="<?php echo uniqid(); ?>">
                <input type="hidden" name="store_id" value="aamarpay">
                <input type="hidden" name="signature_key" value="28c78bb1f45112f5d40b956fe104645a">
                <input type="hidden" name="currency" value="BDT">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-4">
                            <label for="email">Name:</label>
                            <input type="text" placeholder="Customer Name" name="cus_name" class="form-control"
                                id="cus_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mt-4">
                            <label for="email">Email address:</label>
                            <input type="email" placeholder="Customer Email" name="cus_email" class="form-control"
                                id="cus_email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Pay Amount :</label>
                            <input type="number" placeholder="Amount" class="form-control" name="amount">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Address :</label>
                            <input type="text" placeholder="Address" value="Mirpur#10" class="form-control"
                                name="cus_add1">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Address :</label>
                            <input type="text" placeholder="Address" value="Mirpur#10" class="form-control"
                                name="cus_add2">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">City :</label>
                            <input type="text" placeholder="Address" value="Mirpur#10" class="form-control"
                                name="cus_city">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">State :</label>
                            <input type="text" placeholder="Address" value="Mirpur#10" class="form-control"
                                name="cus_state">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Postal Code :</label>
                            <input type="text" placeholder="Address" value="1206" class="form-control"
                                name="cus_postcode">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Country :</label>
                            <input type="text" placeholder="Address" value="1206" class="form-control"
                                name="cus_country">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Phone :</label>
                            <input type="text" placeholder="Address" value="01703008720" class="form-control"
                                name="cus_phone">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Fax :</label>
                            <input type="text" placeholder="Address" value="01703008720" class="form-control"
                                name="cus_fax">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pwd">Fax :</label>
                            <input type="text" placeholder="Address" value="01703008720" class="form-control"
                                name="cus_fax">
                        </div>
                    </div>


                    <input type="hidden" name="amount_vatratio" value="0">
                    <input type="hidden" name="amount_vat" value="0">
                    <input type="hidden" name="amount_taxratio" value="0">
                    <input type="hidden" name="amount_tax" value="0">
                    <input type="hidden" name="amount_processingfee_ratio" value="0">
                    <input type="hidden" name="amount_processingfee" value="0">
                    <input type="hidden" name="desc" value="Fuel">
                    <input type="hidden" name="store_id" value="aamarpay">
                    <input type="hidden" name="signature_key" value="28c78bb1f45112f5d40b956fe104645a">
                    <input type="hidden" name="success_url" value="{{ route('paySuccess') }}">
                    <input type="hidden" name="fail_url" value = "{{ route('payCancel') }}">
                    <input type="hidden" name="cancel_url" value = "{{ route('payFail') }}">

                    <div class="col-md-12 text-center">
                        <button type="submit" value="Pay Now" name="pay"
                            class="btn btn-primary mb-4">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
