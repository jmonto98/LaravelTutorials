@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <div class="contact-details">
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Address:</strong> {{ $address }}</p>
                <p><strong>Phone number:</strong> {{ $phone }}</p>
        </div>
    </div>
</div>
@endsection