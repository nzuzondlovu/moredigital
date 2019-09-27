  @extends('layouts.dashboard')

  @section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>

    <h2>Section title</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">SKU</label>
        <input name="sku" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Price</label>
        <input name="price" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <textarea name="description" class="form-control" id="formGroupExampleInput2" ></textarea>
      </div>
      <div class="custom-file">
        <input name="file" type="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <div class="form-group">        
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>

  </main>

  @endsection
