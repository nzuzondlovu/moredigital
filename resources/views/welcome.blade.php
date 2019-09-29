@extends('layouts.app')


@section('content')

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            @if($products)
              @foreach($products as $product)

                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <a href="{{ route('show', $product->id) }}">
                      <img class="card-img-top" src="{{ asset("/storage/$product->file") }}" alt="Card image cap">
                      <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">{{ $product->views }} Views</button>
                          </div>
                          <small class="text-muted">{{ $product->created_at }}</small>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

              @endforeach
            @endif

          </div>
        </div>
      </div>

@endsection