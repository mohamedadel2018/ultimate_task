@extends('layouts.Dashboard')
@section('title')
    <title>@lang('app.title') | @lang('app.Supervisors_registration')   </title>
@endsection
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"> @lang('app.Supervisors')  </h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">@lang('app.home')</a></li>
                    <li class="breadcrumb-item active">@lang('app.Supervisors') </li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



        @include('errors.error')
        <section class="content" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Auth::user()->hasPermission('users_create'))
                                <a href="{{route('users.create')}}" class="btn btn-primary mb-2"><i class="fas fa-user-plus"></i> @lang('app.add')</a>
                            @else
                              <a href="#" class="btn btn-primary mb-2 disabled"><i class="fas fa-user-plus"></i> @lang('app.add')</a>
                            @endif
                                <div class="card card-purple">
                            <div class="card-header ">
                            <h3 class="card-title-rtl">@lang('app.Supervisors_registration')    <span class="badge badge-info right">{{$users->count()}}</span></h3>



                            </div>
                          <form action="{{route('users.index')}}" method="GET">
                                    <div class="row">
                                       <div class="col-md-3 mt-2 mr-2">
                                       <input type="text" name="search" class="form-control" value="{{ request()->search }}" placeholder="@lang('app.search')">
                                       </div>
                                       <div class="col-md-4 mt-2">
                                        <button type="submit" class="btn  btn-sm btn-primary"><i class="fas fa-search"></i> @lang('app.search')</button>
                                    </div>
                                    </div>
                                  </form>  <!-- end of form-->
                            <!-- /.card-header -->
                            <div class="card-body">

                              <table class="table table-bordered table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">@lang('app.id') </th>
                                    <th>@lang('app.first_name') </th>
                                    <th>@lang('app.last_name') </th>
                                    <th>@lang('app.email') </th>
                                    <th>@lang('app.job_type') </th>
                                    <th>@lang('app.job_title') </th>
                                    <th>@lang('app.mobile') </th>
                                    <th>@lang('app.location') </th>
                                    <th>@lang('app.action') </th>
                                  </tr>
                                </thead>
                                {{-- user control   --}}
                                @if($users->count() > 0)
                                <tbody>
                                @foreach ($users as $index=>$user)
                                  <tr>
                                  <td>{{$index + 1}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                      @if($user->job_type == 1)
                                            @lang('app.supervisors_count')
                                       @elseif($user->job_type == 2)
                                            @lang('app.researcher_count')
                                      @endif
                                      </td>
                                    <td>{{$user->job_title}}</td>

                                    <td>{{$user->mobile}}</td>
                                    <td>{{$user->location}}</td>


                                    <td>
                                      {{-- make Permission for update users --}}
                                    @if(Auth::user()->hasPermission('users_update'))
                                       <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-info" title="@lang('app.edit')"><i class="fa fa-edit"></i> @lang('app.edit')</a>
                                    @else
                                      <a href="#" class="btn btn-sm btn-info disabled"><i class="fa fa-edit"></i> @lang('app.edit')</a>
                                    @endif
                                    {{-- make Permission for delete users --}}
                                    @if(Auth::user()->hasPermission('users_delete'))

                                       <form action="{{route('users.destroy',$user->id)}}" method="POST"  style="display:inline-block;">
                                              @csrf
                                              @method('delete')
                                              <button type="submit" class="btn btn-sm btn-danger"  title=" @lang('app.delete')"> <i class="fa fa-trash"></i> </button>
                                        </form>
                                        @else
                                        <button type="submit" class="btn btn-sm btn-danger disabled"> <i class="fa fa-trash"></i> @lang('app.delete')</button>
                                    @endif
                                    </td>
                                  </tr>

                                @endforeach
                                </tbody>
                                @else
                                <h2> @lang('app.not_data_found')  </h2>
                                @endif
                              </table>
                            </div>

                            <!-- /.card-body -->
                            {{-- <div style="width:5%">
                                {{ $users->appends(request()->query())->links() }}

                            </div> --}}

                            <div class="card-footer clearfix">
                              <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="http://ethicsbooth.local/{{app()->getLocale()}}/users?page=1">&laquo;</a></li>
                              <li class="page-item"><a class="page-link" href="http://ethicsbooth.local/{{app()->getLocale()}}/users?page=1">1</a></li>
                                <li class="page-item"><a class="page-link" href="http://ethicsbooth.local/{{app()->getLocale()}}/users?page=2">2</a></li>
                                <li class="page-item"><a class="page-link" href="http://ethicsbooth.local/{{app()->getLocale()}}/users?page=3">3</a></li>
                                <li class="page-item"><a class="page-link" href="http://ethicsbooth.local/{{app()->getLocale()}}/users?page=4">&raquo;</a></li>
                              </ul>
                            </div>
                          </div>
                </div>
              </section>

        <!-- /.content -->
      </div>


@endsection
