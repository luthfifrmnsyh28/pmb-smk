@extends('adminlte::page')

@section('title', 'Data User')

@section('content_header')
<h1>Manajemen User</h1>
@stop

@section('content')

<div class="mb-3">

    <a href="{{ route('user.create') }}"
        class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah User

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Data User

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th width="60">No</th>

                    <th>Nama</th>

                    <th>Email</th>

                    <th>Role</th>

                    <th width="220">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $user->name }}

                    </td>

                    <td>

                        {{ $user->email }}

                    </td>

                    <td>

                        @foreach($user->roles as $role)

                            <span class="badge badge-success">

                                {{ ucfirst($role->name) }}

                            </span>

                        @endforeach

                    </td>

                    <td>

                        <a href="{{ route('user.show',$user) }}"
                            class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('user.edit',$user) }}"
                            class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        @if(auth()->id() != $user->id)

                        <form
                            action="{{ route('user.destroy',$user) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus user ini?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada data user.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop