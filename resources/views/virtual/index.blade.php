@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            @include('virtual.includes.header')
        </div>
        <div class="col-8">
            @include('virtual.includes.alias-domain.alias-domain-table')

            @include('virtual.includes.aliases.aliases-table')

            @include('virtual.includes.mailboxes.mailboxes-table')
        </div>
    </div>
@endsection
