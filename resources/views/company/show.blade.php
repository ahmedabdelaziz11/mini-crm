@extends('layouts.master')

@section('css')
@endsection

@section('title')
{{ __('company.companies') }}
@stop


@section('page-header')
{{ __('company.companies') }}
@endsection

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>error</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('mss'))
<div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>success</strong>
    <ul>
        {{session()->get('mss')}}
    </ul>
</div>
@endif

<div class="row row-sm p-3 m-3">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-body">
                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('company.name') }} : {{$company->name}}</div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('company.email') }} : {{$company->email}}</div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('company.logo') }}</div>
                            <img src="{{asset('storage/logos/'.$company->logo)}}" height=100 width=100>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('company.website') }} : {{$company->website}}</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection