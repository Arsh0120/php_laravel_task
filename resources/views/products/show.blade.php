@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>{{ $product->amount }}</p>
<p>{{ $product->description }}</p>
@if($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
@endif
@endsection
