@extends('login.main')
@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('errors'))
    <div class="alert alert-danger" >
        {{ session('errors')->first() }}
    </div>
    @endif
    <br><br>
    <form action="/aksiLogin" class="container col-md-5 py-5" method="post" >
        <div class="card mx-4 mx-md-5 shadow-5-strong mt-0" style="margin-top: -100px;background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
    <div class="card-body py-5 px-md-5">

    <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
        @csrf
        <h3 class="mb-3" align="center">Login</h3>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                  </div>
      
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <br>
        <button class="btn btn-primary plus float-right" >Login</button>
    </form>
    <center>
        <br>
        <a href="/register" style="color: #121314;">Create New account</a>
    </center>

</div>
</div>
</div>
</div>


    
@endsection
