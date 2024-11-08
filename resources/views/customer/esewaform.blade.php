@extends('layout.customer.master')

@section('content')
    @include('layout.customer.header')

    <body>
        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            <input id="amount" type="text" name="amount" value="{{ $booking->service->price }}" required>
            <input id="tax_amount" type="text" name="tax_amount" value="0" required>
            <input id="total_amount" type="text" name="total_amount" value="{{ $booking->service->price }}" required>
            <input id="transaction_uuid" type="text" name="transaction_uuid" value="{{ $invoice }}" required>
            <input id="product_code" type="text" name="product_code" value="{{ $product_code }}" required>
            <input id="product_service_charge" type="text" name="product_service_charge" value="0" required>
            <input id="product_delivery_charge" type="text" name="product_delivery_charge" value="0" required>
            <input id="success_url" type="text" name="success_url"
                value="http://127.0.0.1:8000/photography/esewasuccess.blade.php" required>
            <input id="failure_url" type="text" name="failure_url"
                value="http://127.0.0.1:8000/photography/esewafailed.blade.php" required>
            <input id="signed_field_names" type="text" name="signed_field_names"
                value="total_amount,transaction_uuid,product_code" required>
            <input id="signature" type="text" name="signature" value="{{ $base64_signature }}" required>
            <input value="Submit" type="submit">
        </form>
    </body>
@endsection
