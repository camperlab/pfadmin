@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-normal pt-2">Add a new domain</h5>
                </div>
                <form method="post" action="{{ route('domains.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="Domain" class="col-sm-3 col-form-label">Domain</label>
                            <div class="col-sm-9">
                                <span class="mt-2 ms-1 d-block">{{ $domain->domain }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input
                                    name="description"
                                    value="{{ $domain->description }}"
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="Description">
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Aliases" class="col-sm-3 col-form-label">Aliases</label>
                            <div class="col-sm-9">
                                <input
                                    type="number"
                                    name="aliases"
                                    value="{{ $domain->aliases }}"
                                    class="form-control @error('aliases') is-invalid @enderror"
                                    id="Aliases">
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">-1 = disable | 0 = unlimited</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Mailboxes" class="col-sm-3 col-form-label">Mailboxes</label>
                            <div class="col-sm-9">
                                <input
                                    type="number"
                                    name="mailboxes"
                                    value="{{ $domain->mailboxes }}"
                                    class="form-control @error('mailboxes') is-invalid @enderror"
                                    id="Mailboxes">
                                @error('mailboxes')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="text-secondary">-1 = disable | 0 = unlimited</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Mail server is backup MX</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="IsBackup"></label>
                                    <input id="IsBackup" checked="{{ $domain->backupmx }}" name="backupmx" class="form-check-input" type="checkbox">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Active</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="IsActive"></label>
                                    <input id="IsActive" checked="{{ $domain->active }}" name="active" class="form-check-input" type="checkbox">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Add default mail aliases</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="DefaultAliases"></label>
                                    <input id="DefaultAliases" name="active" class="form-check-input" checked type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Domain</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
