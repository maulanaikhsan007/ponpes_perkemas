@extends('layouts.master')

@section('title')
    Update Pengguna
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Pengguna</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pondok Pesantren Perkemas</h2>
            <p class="section-lead">
              Halaman Edit Data Pengguna
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('user.update', $user->id)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required="" placeholder="Nama" required>
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required="" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                    	<option value="">Pilih Role</option>
                                    	<option value="admin" <?php if($user->role=='admin'){ echo "selected"; } ?>>Admin</option>
                                    	<option value="bendahara" <?php if($user->role=='bendahara'){ echo "selected"; } ?>>Bendahara</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/user"><i class="fas fa-times-circle"></i> Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@include('sweetalert::alert')