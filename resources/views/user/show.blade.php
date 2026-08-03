@extends('adminlte::page')

@section('title', 'Detail User')

@section('content_header')
<h1>Detail User</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Informasi User

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">ID User</th>
                <td>{{ $user->id }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>Role</th>
                <td>

                    @forelse($user->roles as $role)

                        <span class="badge badge-success">

                            {{ ucfirst($role->name) }}

                        </span>

                    @empty

                        <span class="badge badge-secondary">

                            Belum Memiliki Role

                        </span>

                    @endforelse

                </td>
            </tr>

            <tr>
                <th>Email Verified</th>
                <td>

                    @if($user->email_verified_at)

                        <span class="badge badge-success">

                            Sudah Verifikasi

                        </span>

                    @else

                        <span class="badge badge-warning">

                            Belum Verifikasi

                        </span>

                    @endif

                </td>
            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>

                    {{ $user->created_at->format('d F Y H:i') }}

                </td>
            </tr>

            <tr>
                <th>Terakhir Diupdate</th>
                <td>

                    {{ $user->updated_at->format('d F Y H:i') }}

                </td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('user.edit',$user) }}"
            class="btn btn-warning">

            <i class="fas fa-edit"></i>

            Edit

        </a>

        <a href="{{ route('user.index') }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

</div>

@stop