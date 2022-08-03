@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <a class="btn btn-sm btn-secondary" href="{{ route('admins') }}">Back</a>
                        </div>
                        <h5 class="fw-normal pt-2">Edit a new domain admin</h5>
                    </div>
                </div>
                <form method="post" action="{{ route('admins.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="AdminInput" class="col-sm-3 col-form-label">Admin</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="username" value="{{ $admin->username }}">
                                <span class="d-block">{{ $admin->username }}</span>
                                <span class="text-secondary">email address</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="Password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="passwordRepeat" class="col-sm-3 col-form-label">Password (again)</label>
                            <div class="col-sm-9">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="passwordRepeat">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Super admin</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="SuperAdmin"></label>
                                    <input
                                        id="SuperAdmin"
                                        name="superadmin"
                                        @if ($admin->superadmin) checked @endif
                                        class="form-check-input"
                                        type="checkbox">
                                </div>

                                <span class="text-secondary">
                                    Super admins have access to all domains, can manage domains and admin accounts.
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Domains" class="col-form-label col-sm-3 pt-0">Domains</label>
                            <div class="col-sm-9">
                                <select id="Domains" class="form-select" name="domains[]" multiple>
                                    @foreach($domains as $domain)
                                        <option @if($admin->domains()->where('domain', '=', $domain->domain)->exists()) selected @endif value="{{ $domain->domain }}">{{ $domain->domain }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Active</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="IsActive"></label>
                                    <input
                                        id="IsActive"
                                        name="active"
                                        class="form-check-input"
                                        @if ($admin->active) checked @endif
                                        type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
