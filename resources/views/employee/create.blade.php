@extends('layouts.master')

@section('css')
@endsection

@section('title')
{{ __('company.add_employee') }}
@stop


@section('page-header')
{{ __('company.add_employee') }}
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
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <form  action="{{ route('employees.store') }}" method="post" autocomplete="off">
                    @csrf


                    <div class="row">
                        <div class="col">
                            <label class="control-label">{{ __('employee.first_name') }}</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">{{ __('employee.last_name') }}</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">{{ __('employee.company') }}</label>
                            <select name="company_id" class="form-control">
                                <option value="" selected>{{ __('employee.select_company') }}</option>
                                @foreach ($companies as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">{{ __('employee.email') }}</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="control-label">{{ __('employee.phone') }}</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-100 ">{{ __('employee.add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection