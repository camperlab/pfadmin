@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <a class="btn btn-sm btn-secondary" href="{{ route('virtual.index') }}">Back</a>
                        </div>
                        <h5 class="fw-normal pt-2">Create a new mailbox for your domain.</h5>
                    </div>
                </div>

                <form method="post" action="{{ route('mailboxes.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="Username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input
                                    name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    id="Username">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary"></span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Domain" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <select id="Domain" name="domain" class="form-select">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->domain }}">{{ $domain->domain }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="Password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">Password for POP3/IMAP</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Password" class="col-sm-3 col-form-label">Password (again)</label>
                            <div class="col-sm-9">
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="Password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">Full name</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Quota" class="col-sm-3 col-form-label">Quota</label>
                            <div class="col-sm-9">
                                <input
                                    name="quota"
                                    class="form-control @error('quota') is-invalid @enderror"
                                    id="Quota">
                                @error('quota')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">MB</span>
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
                                        type="checkbox"
                                        checked>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="SendWelcome" class="col-form-label col-sm-3 pt-0">Send Welcome Mail</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input
                                        id="SendWelcome"
                                        name="welcome_mail"
                                        class="form-check-input"
                                        type="checkbox"
                                        checked>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="OtherEmail" class="col-sm-3 col-form-label">Other e-mail</label>
                            <div class="col-sm-9">
                                <input
                                    name="other_email"
                                    class="form-control @error('other_email') is-invalid @enderror"
                                    id="OtherEmail">
                                @error('other_email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">Used if the password is forgotten</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Mailbox</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
