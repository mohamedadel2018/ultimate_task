@extends('layouts.Dashboard')
@section('title')
    <title>@lang('app.title') | @lang('app.filter_case')   </title>
@endsection
@section('content')

<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"> @lang('app.filter_case') </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">@lang('app.filter_case') </li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}">@lang('app.home')</a></li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <filter-case></filter-case>
    </div>
</div>
@endsection

