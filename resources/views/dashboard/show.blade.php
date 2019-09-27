@extends('layouts.dashboard')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <h2>Section title</h2>
  <a class="btn btn-primary" href="/dashboard/product/{{ $product->id }}/edit">Edit Product</a>
  <div class="row">
    <div class="col-md-6">
      <div class="card" style="width: 100%;">
        <img class="card-img-top" src="{{ asset("/storage/$product->file") }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <p class="card-text">{{ $product->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Views : {{ $product->id }}</li>
          <li class="list-group-item">Highest Bid : {{ $product->id }}</li>
          <li class="list-group-item">Average Bid : {{ $product->id }}</li>
          <li class="list-group-item">Lowest Bid : {{ $product->id }}</li>
        </ul>
      </div>
    </div>
    <div class="col-md-6">
      <div class="table-responsive">
    @if($bids)
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bids as $bid)
        <tr>
          <td>{{ $bid->id }}</td>
          <td>{{ $bid->email }}</td>
          <td>R {{ $bid->price }}</td>
          <td>{{ $bid->date }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @else
      Sorry No Bids Available.
      @endif
    </div>
    </div>
  </div>

</main>

@endsection
