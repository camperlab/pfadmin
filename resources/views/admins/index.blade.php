@extends('layouts.app')
@php use Carbon\Carbon; @endphp
@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 fs-5">Admin List</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped mb-0 border-white">
                        <thead>
                        <tr>
                            <th scope="col">Admin</th>
                            <th scope="col">Domains</th>
                            <th scope="col">Active</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $key => $admin)
                            <tr>
                                <td>{{ substr($admin->username, 0, 20) }}</td>
                                <td>{{ $admin->superadmin === 1 ? 'SuperAdmin' : $admin->domains->count() }}</td>
                                <td><a
                                        href="{{ route('admins.toggle-active', ['username' => $admin->username]) }}"
                                        class="btn btn-sm {{ $admin->active ? 'btn-primary' : 'btn-secondary' }}"
                                    >{{ $admin->active ? 'Yes' : 'No' }}</a></td>
                                <td>{{ Carbon::parse($admin->modified)->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('admins.edit', ['username' => $admin->username]) }}"
                                       class="btn btn-sm btn-primary">Edit</a>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $key }}"
                                    >Delete</button>
                                    @include('admins.includes.delete-modal', ['key' => $key])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ route('admins.create') }}" class="btn btn-sm btn-outline-secondary">Add Admin</a>
                            <button class="btn btn-sm btn-outline-secondary">Export CSV</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
