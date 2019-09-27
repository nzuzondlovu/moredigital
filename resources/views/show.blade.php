@extends('layouts.app')

@section('content')
<div class="container">
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
          <td>R {{ $bid->amount }}</td>
          <td>{{ $bid->created_at }}</td>
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

  <div class="row">
    <h2>Create Bid</h2>
      <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
          <form action="{{ route('bid.store', $product->id) }}" method="post">
            @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input name="email" type="email" class="form-control" id="formGroupExampleInput">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Amount</label>
                <input name="amount" type="number" class="form-control" id="formGroupExampleInput">
              </div>
              <div class="form-group">        
                <button class="btn btn-primary" type="submit">Submit Bid</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
