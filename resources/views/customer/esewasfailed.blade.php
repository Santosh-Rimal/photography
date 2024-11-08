@extends('layout.customer.master')
@section('content')
    @include('layout.customer.header')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
            margin: 0;
            /* Remove default margin */
        }

        .message-box {
            display: flex;
            justify-content: center;
            align-items: center;
            color: red;
            font-size: 108px;
            /* Large font size */
            text-align: center;
            /* Center the text */
        }
    </style>

    <div class="message-box">
        You have canceled your payment.
    </div>
@endsection
