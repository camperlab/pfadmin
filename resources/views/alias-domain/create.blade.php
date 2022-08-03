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
                        <h5 class="fw-normal pt-2">Mirror addresses of one of your domains to another.</h5>
                    </div>
                </div>
                <form method="post" action="{{ route('alias-domain.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="AliasDomain" class="col-sm-3 col-form-label">Alias Domain</label>
                            <div class="col-sm-9">
                                <select id="AliasDomain" name="alias_domain" class="form-select @error('alias_domain') is-invalid @enderror">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->domain }}">{{ $domain->domain }}</option>
                                    @endforeach
                                </select>

                                @error('alias_domain')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <span class="text-secondary">The domain that mails come in for.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TargetDomain" class="col-sm-3 col-form-label">Target Domain</label>
                            <div class="col-sm-9">
                                <select id="TargetDomain" name="target_domain" class="form-select @error('target_domain') is-invalid @enderror">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->domain }}">{{ $domain->domain }}</option>
                                    @endforeach
                                </select>

                                @error('target_domain')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <span class="text-secondary">The domain where mails should go to.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label for="IsActive" class="col-form-label col-sm-3 pt-0">Active</label>
                                <div class="col-sm-9">
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
                            <button type="submit" class="btn btn-primary">Add Alias Domain</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
