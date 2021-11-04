@extends('layouts.Dashboard')

@section('title')
    <title>@lang('app.title') | @lang('app.edit')   </title>
@endsection
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Supervisors</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">@lang('app.home')</a></li>
                <li class="breadcrumb-item active"><a href="{{route('users.index')}}">@lang('app.Supervisors')</a> </li>
                    <li class="breadcrumb-item active">@lang('app.edit') </li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-purple">
                      <div class="card-header">
                        <h3 class="card-title-rtl">@lang('app.edit')</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                    <form  action="{{route('users.update', $user->id)}}" method="POST">
                      @csrf
                      @method('put')
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">@lang('app.first_name')</label>
                              <input type="text" name="first_name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{$user->first_name}}" placeholder="@lang('app.first_name')" >
                              @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                             @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('app.last_name')</label>
                                <input type="text" name="last_name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{$user->last_name}}" placeholder="@lang('app.last_name')" >
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">@lang('app.email')</label>
                                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{$user->email}}" placeholder="@lang('app.email')" >
                                  @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                   @enderror
                                </div>



                              <div class="form-group">
                                  <label for="exampleInputEmail1">@lang('app.job_title')</label>
                                <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror" id="exampleInputEmail1"  value="{{$user->job_title}}" placeholder="@lang('app.job_title')" >
                                @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">@lang('app.location')</label>
                                <select  name="location"  class="form-control @error('location') is-invalid @enderror" id="exampleInputEmail1"  value="{{$user->location}}" placeholder="@lang('app.location')" >
                                  @foreach($provinces as $province)
                                    <option value="{{$province->name}}">{{$province->name}}</option>
                                  @endforeach
                              </select>
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">@lang('app.mobile')</label>
                                <input type="number" name="mobile" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{$user->mobile}}" placeholder="@lang('app.mobile')" >
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                              </div>




                            <div class="col-12">
                              <div class="form-group">
                                <label > @lang('app.perimissions')</label>

                                <!-- Custom Tabs -->

                                @php
                                    $models = ['users','caseSearch','products'];
                                @endphp
                                <div class="card">
                                  <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3"></h3>
                                    <ul class="nav nav-pills ml-auto p-2">
                                      @foreach ($models as $index=>$model)
                                       <li class="nav-item"><a class="nav-link {{$index == 0 ? 'active' : ''}}" href="#{{$model}}" data-toggle="tab">@lang('app.'.$model)</a></li>
                                      @endforeach

                                      <li class="nav-item dropdown">
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                                          <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                                          <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                                          <div class="divider"></div>
                                          <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                                        </div>
                                      </li>
                                    </ul>
                                  </div><!-- /.card-header -->
                                  <div class="card-body">
                                    <div class="tab-content">
                                    @foreach ($models as $index=>$model)
                                      <div class="tab-pane {{$index == 0 ? 'active' : ''}}" id="{{$model}}">
                                          <div class="form-check">

                                                <label class="mr-4" >  <input type="checkbox" name="permissions[]" {{$user->hasPermission($model . '_' . 'create' )  ? 'checked' : '' }} value="{{$model}}_create"> @lang('app.create')</label>

                                                <label class="mr-4" >  <input type="checkbox" name="permissions[]" {{$user->hasPermission($model . '_' . 'read'   )    ? 'checked' : ''}} value="{{$model}}_read"> @lang('app.read')</label>

                                                <label class="mr-4" >  <input type="checkbox" name="permissions[]" {{$user->hasPermission($model . '_' . 'update' ) ? 'checked' : ''}} value="{{$model}}_update"> @lang('app.update')</label>

                                                <label class="mr-4" >  <input type="checkbox" name="permissions[]" {{$user->hasPermission($model . '_' . 'delete' ) ? 'checked' : '' }} value="{{$model}}_delete"> @lang('app.delete')</label>

                                            </div>
                                      </div>
                                    @endforeach
                                      <!-- /.tab-pane -->
                                      <div class="tab-pane" id="categories">

                                      </div>
                                      <!-- /.tab-pane -->
                                      <div class="tab-pane" id="products">

                                      </div>
                                      <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                  </div><!-- /.card-body -->
                                </div>
                                <!-- ./card -->
                              </div>
                              <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">@lang('app.edit') </button>
                        </div>
                      </form>
                    </div>
              </section>

        <!-- /.content -->
      </div>


@endsection
