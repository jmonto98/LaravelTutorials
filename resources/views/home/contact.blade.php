@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <div class="contact-details">
                <p><strong>Email:</strong> {{ $viewData["email"] }}</p>
                <p><strong>Address:</strong> {{ $viewData["address"] }}</p>
                <p><strong>Phone number:</strong> {{ $viewData["phone"] }}</p>
        </div>
    </div>
</div>
@endsection