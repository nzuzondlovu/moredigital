@extends('layouts.dashboard')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  @if (session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
  @endif
  <h2>Section title</h2>
  <div class="table-responsive">

    @if($products)
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
          <th>SKU</th>
          <th>Description</th>
          <th>Price</th>
          <th>Views</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>
            <img src="{{ asset("/storage/$product->file") }}" class="img-thumbnail" style="width: 150px">
          </td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->sku }}</td>
          <td>{{ $product->description }}</td>
          <td>R {{ $product->price }}</td>
          <td>{{ $product->views }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('product.show', $product->id) }}">Show Product</a>
            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">Edit Product</a>
            <a class="btn btn-danger" href="{{ route('product.destroy', $product->id) }}">Delete Product</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    Sorry No Products Available.
    @endif

  </div>
</main>

@endsection
