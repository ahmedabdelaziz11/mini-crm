@extends('layouts.master')

@section('css')
@endsection

@section('title')
{{ __('employee.employees') }}
@stop


@section('page-header')
{{ __('employee.employees') }}
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
                            <div> {{ __('employee.first_name') }} : {{$employee->first_name}}</div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('employee.last_name') }} : {{$employee->last_name}}</div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('employee.company') }} : {{$employee->company->name ?? '-'}}</div>
                        </div>
                    </div>


                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('employee.email') }} : {{$employee->email}}</div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <div> {{ __('employee.phone') }} : {{$employee->phone}}</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection