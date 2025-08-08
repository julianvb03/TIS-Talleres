@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="text-center">
    Product {{ $viewData['product_name'] }} created successfully with a price of {{ $viewData['product_price'] }}.
</div>
@endsection