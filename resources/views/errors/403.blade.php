 @extends('layouts.Dashboard')

@section('title')
    <title>@lang('app.title') | @lang('app.registration')   </title>
@endsection
@section('content')
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> @lang('app.Error_Page') 403</h1>
          </div>
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">@lang('app.home')</a></li>
              <li class="breadcrumb-item active"> @lang('app.Error_Page') 403</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content  Handel Error 403-->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 403</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> @lang('app.Page_not_found')</h3>

          <p>
          @lang('app.could_not_find_the_page') <br> @lang('app.back')
             <a href="{{url('/structureCase')}}"> @lang('app.Home_page') </a>
          </p>

          <form class="search-form">
            <div class="input-group">

              <div class="input-group-append">
               
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

@endsection
