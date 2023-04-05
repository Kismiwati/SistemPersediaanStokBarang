@extends('login.main')
@section('content')

    <form action="/aksiRegister" class="container col-md-5 py-5" method="post">
        <div class="card mx-4 mx-md-5 shadow-5-strong mt-2" style="margin-top: -100px;background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
            <div class="card-body py-5 px-md-5">
        
            <div class="row d-flex justify-content-center">
        @csrf
        <h3 class="mb-3" align="center">Registrasi</h3>
        <div class="form-group">
            <label for="name">name</label>
            <input type="name" name="name" id="name" class="form-control" autofocus>
        </div>
        @error('name')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" autofocus>
        </div>
        @error('email')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" autofocus>
        </div>
        @error('password')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="form-group ">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="admin">Admin</option>
                <option value="karyawan">Karyawan</option>
            </select>
        </div>
        @error('level')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        
        <button class="btn btn-primary mt-4">Register</button>
    </form>
</div>
</div>
</div>
</div>
@endsection


