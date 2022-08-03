@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 fs-5">Domains List</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped mb-0 border-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Domain</th>
                            <th scope="col">Description</th>
                            <th scope="col">Aliases</th>
                            <th scope="col">Mailboxes</th>
                            <th scope="col">Is Backup MX</th>
                            <th scope="col">Active</th>
                            <th scope="col">Last modified</th>
                            <th scope="col">Pass expires</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($domains as $key => $domain)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $domain->domain }}</td>
                                <td>{{ $domain->description !== '' ? $domain->description : '—' }}</td>
                                <td>{{ $domain->aliases }}</td>
                                <td>{{ $domain->mailboxes }}</td>
                                <td>{{ $domain->backupmx ? 'Yes' : 'No' }}</td>
                                <td>{{ $domain->active ? 'Yes' : 'No' }}</td>
                                <td>{{ Carbon::parse($domain->modified)->toDateString() }}</td>
                                <td>{{ 368 }}</td>
                                <td>
                                    <a
                                        href="{{ route('domains.edit', ['domain' => $domain->domain]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $key }}"
                                    >Delete</button>

                                    @include('domains.includes.delete-modal', ['key' => $key])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <div class="btn-group">
                            <a href="{{ route('domains.create') }}" class="btn btn-sm btn-outline-secondary">Add Domain</a>
                            <button class="btn btn-sm btn-outline-secondary">Export CSV</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
