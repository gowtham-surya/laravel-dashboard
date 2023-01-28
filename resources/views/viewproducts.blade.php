@extends('_layout')

@section('content')
<div class="container mt-3 h-100">
    <h4>Here's a list of available products</h4>
    <table class="table mt-3 table-striped">
        <thead>
            <td>Name</td>
            <td>Description</td>
            <td>Count</td>
            <td>Price</td>
        </thead>
        <tbody>
            @foreach ($allProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td class="inner-table">{{ $product->description }}</td>
                    <td class="inner-table">{{ $product->count }}</td>
                    <td class="inner-table">{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection