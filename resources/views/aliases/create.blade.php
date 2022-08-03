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
                        <h5 class="fw-normal pt-2">Create a new alias for your domain.</h5>
                    </div>
                </div>
                <form method="post" action="{{ route('aliases.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="Alias" class="col-form-label col-sm-3 pt-0">Alias</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input
                                        id="Alias"
                                        name="alias"
                                        class="form-control"
                                        checked>
                                    <span class="text-secondary">To create a catch-all use an "*" as alias.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Domain" class="col-form-label col-sm-3 pt-0"></label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <select id="Domain" name="domain" class="form-select">
                                        @foreach($domains as $domain)
                                            <option value="{{ $domain->domain }}">{{ $domain->domain }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ToLabel" class="col-form-label col-sm-3 pt-0">To</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <textarea
                                        id="ToLabel"
                                        name="to"
                                        class="form-control"
                                        rows="10"
                                    ></textarea>
                                    <span class="text-secondary">To create a catch-all use an "*" as alias.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label for="IsActive" class="col-form-label col-sm-4 pt-0">Active</label>
                                <div class="col-sm-8 p-0">
                                    <div class="form-check">
                                        <input
                                            id="IsActive"
                                            name="active"
                                            class="form-check-input"
                                            checked
                                            type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Add Alias</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
