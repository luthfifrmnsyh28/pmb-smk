@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
<h1>Edit User</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Form Edit User

        </h3>

    </div>

    <form action="{{ route('user.update', $user) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <div class="form-group">

                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                    class="form-control">

                <small class="text-muted">
                    Kosongkan jika password tidak ingin diubah.
                </small>

            </div>

            <div class="form-group">

                <label>Role</label>

                <select
                    name="role"
                    class="form-control"
                    required>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->name }}"
                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>

                            {{ ucfirst($role->name) }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="form-group">

    <label>Status</label>

    <select
        name="status"
        class="form-control"
        required>

        <option
            value="1"
            {{ old('status', $user->status) ? 'selected' : '' }}>

            Aktif

        </option>

        <option
            value="0"
            {{ !old('status', $user->status) ? 'selected' : '' }}>

            Nonaktif

        </option>

    </select>

</div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Update

            </button>

            <a href="{{ route('user.index') }}"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

@stop