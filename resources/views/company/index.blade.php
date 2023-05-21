@extends('layouts.master')

@section('css')
@endsection

@section('title')
{{ __('company.companies_list') }}
@stop


@section('page-header')
{{ __('company.companies') }}
@endsection

@section('content')
@if (session()->has('delete'))
<div class="alert alert-success">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>success</strong>
    <ul>
        {{session()->get('delete')}}
    </ul>
</div>
@endif
<div class="contaner">
    <div class="row p-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('companies.create')}}">{{ __('company.add_company') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-10 mx-auto">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <td>#</td>
                        <td>{{ __('company.name') }}</td>
                        <td>{{ __('company.email') }}</td>
                        <td>{{ __('company.logo') }}</td>
                        <td>{{ __('company.website') }}</td>
                        <td>{{ __('company.employees_count') }}</td>
                        <td>{{ __('company.operations') }}</td>
                    </tr>
                </thead>
                <tbody>
                @forelse ($companies as $company)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td><a href="/companies/{{ $company->id}}">{{$company->name}}</a></td>
                        <td>{{$company->email}}</td>
                        <td><img src="{{asset('storage/logos/'.$company->logo)}}" height=100 width=100></td>
                        <td>{{$company->website}}</td>
                        <td>{{$company->employees_count}}</td>
                        <td>
                            <a href="{{route('companies.edit',$company->id)}}" class="btn btn-sm btn-primary">edit</a>
                            
                            <form action="{{route('companies.destroy',$company->id)}}" method="post" class="delete-form">
                                {{ method_field('delete') }}
								{{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr class="text-center">
                    <td colspan="7">No companies</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="row d-felx justify-content-center">
                {{ $companies->links('pagination-links') }} 
            </div>   
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            alert('are sure of the deleting process');
            e.currentTarget.submit();
        });

    
    });
</script>

@endsection