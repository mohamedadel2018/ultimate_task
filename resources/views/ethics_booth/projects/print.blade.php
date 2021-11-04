@extends('layouts.print')
@section('title')
    <title>@lang('app.title') | @lang('app.print')   </title>


    <style>
/* start style for Print */



        @media print {
        .not-print  {
            display: none !important;
        }

        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
        tfoot { display:table-footer-group }


        .table{
            max-width: 2480px !important;
            width:100% !important;
            height: auto !important;
        }
        .table td{
            width: auto !important;
            overflow: hidden !important;
            word-wrap: break-word !important;
        }

        .margin-print-1{
            margin-top: 105% !important ;
        }
        .margin-print-3{
            margin-top: 52% !important ;
        }
        .margin-print-2{
            margin-top: 41% !important ;
        }
        .margin-print-5{
        margin-top: 25%
        }
        .margin-print-6{
            margin-top: 10% !important ;
        }

        .margin-print-8{
            margin-top: 5%
        }

        }
/* End style for Print */

        .table-bordered-bold, .table-bordered-bold td, .table-bordered-bold th {
            border: 3px solid black;
        }

        .underline {
         border-bottom: 2px solid currentColor;
        }
        .underline--dotted {
         border-bottom: 3px dashed;
        }
        .padding-width{
            padding-left: 30%;
            padding-right: 30%;
        }
        .padding-width-2{
            padding-left: 13%;
            padding-right: 13%;
        }
        .padding-width-3{
            padding-left: 5%;
            padding-right: 5%;
        }
        .no-margin-button{
            margin-bottom: 0rem;
        }
        .content-wrapper{
            direction: rtl !important;
        }
        .{
            white-space: ;
        }
        .w-100{
            width: 100%;
        }
        .border-l-none{
            border-left: none !important;
        }
        .border-r-none{
            border-right: none !important;
        }
        .border-b-none{
            border-bottom: none !important;
        }
        .border-t-none{
            border-top: none !important;
        }
        .border-none{
            border: none !important;
        }
        .border-sm{
            padding-top: 0.1rem !important;
            padding-bottom: 0.1rem !important;
        }
    </style>
@endsection
@section('content-print')

<?php
use App\Models\User;
use Carbon\Carbon;

        $researcher1 = User::find( $searchCase->researcher1);
        $Supervisors1 = User::find( $searchCase->Supervisors1);
        $researcher2 = User::find( $searchCase->researcher2);
        $Supervisors2 = User::find( $searchCase->Supervisors2);
        $researcher3 = User::find( $searchCase->researcher3);
        $Supervisors3 = User::find( $searchCase->Supervisors3);
?>

<div >
    <div class="col-md-2 ">


        <div class="row ">
            <button class="btn btn-default mt-4  ml-4 float-right not-print" onclick={window.print()}><i class="fa fa-print" aria-hidden="true"></i> @lang('app.print')</button>

        </div>
    </div>
      <!-- Content Header (Page header) -->
      <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">@lang('app.case_search') ( {{$searchCase->id}} ) </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('show_all')}}">@lang('app.home')</a></li>
                        <li class="breadcrumb-item active">@lang('app.print') </li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

            <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="col-md-3">
                    <img  src='{{url('images/Qr/'.$searchCase->QrCode)}}' width="30%" alt="Qr" title="Search Case Qr Code">
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                <div class="table-responsive">
                  <table class="table table-bordered-bold ">
                    <thead>
                      <tr>

                        <th style="border-left:none !important;text-align: end;" > البيانات التعريفيه</th>
                        <th   style="border-right:none !important;"></th>
                      </tr>
                    </thead>
                    <tbody >
                      <tr>
                        <td>
                          <p>  محافظة :  <span class=" ml-4 underline underline--dotted padding-width-2"> {{$searchCase->Provinces}} </span>  </p>
                          <p>  قسم/مركز :  <span class="ml-4 underline underline--dotted padding-width-3"> {{$searchCase->zone}} </span> </p>
                          <p>  القرية/الشياخة :  <span class="ml-4 underline underline--dotted padding-width-3"> {{$searchCase->Village}} </span> </p>
                          <p>  اسم المستجيب :  <span class="ml-4 underline underline--dotted padding-width-3"> {{$searchCase->respondent_name}} </span> </p>
                          <p>  اسم رب الأسرة :  <span class="ml-4 underline underline--dotted padding-width-3"> {{$searchCase->family_name}} </span> </p>
                          <p>  العنوان بالتفصيل :  <span class="ml-4 underline underline--dotted padding-width-3"> {{$searchCase->address}} </span> </p>
                          <p>   رقم التليفون :  ارضي  <span class="ml-1 underline underline--dotted padding-width-3"> {{$searchCase->phone_home}}  </span> <span class="mr-2">موبيل</span>   <span class="ml-1 underline underline--dotted padding-width-3"> {{$searchCase->phone}} </span> </p>
                          <p> <table class="table table-bordered-bold col-md-6 mt-2 text-center"> مسلسل الأسرة :  <tr class="text-sm">  <th class="<?php if(isset($searchCase->family_number)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->family_number,-5,1)}} </th> <th class="<?php if(isset($searchCase->family_number)) echo  'pt-1 pb-1' ?>" >{{substr($searchCase->family_number,-4,1)}} </th> <th class="<?php if(isset($searchCase->family_number)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->family_number,-3,1)}} </th> <th class="<?php if(isset($searchCase->family_number)) echo  'pt-1 pb-1' ?>"> {{substr($searchCase->family_number,-2,1)}} </th> <th class="<?php if(isset($searchCase->family_number)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->family_number,-1,1)}} </th> </tr></table></p>
                        </td>
                        <td style="width: 40%;"   class="text-sm ">
                            محافظة : <div class="row mr-2"><div class="col-md-2"></div>  <table class="table table-bordered-bold no-margin-button col-md-4" > <tr class="text-sm" >  <th> </th>  <th> </th> </tr></table></div>
                             قسم/مركز :  <div class="row mr-2"><div class="col-md-2"></div>  <table class="table table-bordered-bold no-margin-button col-md-4" > <tr>   <th> </th>  <th> </th> </tr> </td> </table></div>
                             القرية/الشياخة : <div class="row mr-2">  <div class="col-md-2"></div> <table class="table table-bordered-bold no-margin-button col-md-4" > <tr> <th> </th>  <th> </th> </tr> </td> </table></div>
                             الوحدةالاجتماعيه : <div class="row mr-2"> <div class="col-md-2"></div> <table class="table table-bordered-bold no-margin-button col-md-4" > <tr>  <th> </th>  <th> </th> </tr> </td> </table></div>
                             رقم سطر المستجيب : <div class="row mr-2"> <div class="col-md-2"></div>  <table class="table table-bordered-bold no-margin-button col-md-4" > <tr>   <th> </th>  <th> </th> </tr> </td> </table></div>
                             رقم سطر المستجيب : <div class="row mr-2"> <div class="col-md-2"></div>  <table class="table table-bordered-bold no-margin-button col-md-4"> <tr>   <th> </th>  <th> </th> </tr> </td> </table></div>

                            <p class="m-0">  الاحداثيات : </p>
                           <div  class="row col-md-12 ">  <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-5" > <tr>   <th style="width:70%;"> </th>  <th> </th> </tr> </td> </table>  X</div>
                           <div  class="row col-md-12 mt-1 mb-0">  <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-5" > <tr>   <th style="width:70%;"> </th>  <th> </th> </tr> </td> </table>  Y</div>

                            {{-- <table class="table table-bordered-bold no-margin-button text-xs" style="width:50%;margin-right: 30%;"> <tr>  <td style="width: 60%;" class="pt-0 pb-0"> </td>  <td> </td> <th style="border: none;">X</th> </tr> </table>
                            <table class="table table-bordered-bold no-margin-button text-xs" style="width:50%;margin-right: 30%;"> <th style="width: 60%;"> </th>  <th> </th>  <th style="border: none;">Y</th></tr>  </td> </table> --}}

                    </tr>
                    </tbody>
                  </table>
                </div>



        <div class="table-responsive">
                  <table class="table table-bordered-bold mt-4 ">
                    <thead>
                      <tr >
                        <th  class="text-center" > زيارات الباحث</th>
                        <th   class="text-center"> الزيارة النهائيه</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <td class="p-0">
                        <table class="w-100 border-none" >
                            <tr >
                                <td class="border-t-none border-r-none p-1">

                                </td>
                                <td class="text-center border-t-none p-1">
                                    ١
                                </td>
                                <td class="text-center border-t-none p-1">
                                    ٢
                                </td>
                                <td class="text-center border-t-none border-l-none p-1" >
                                    ٣
                                </td>
                            </tr>
                            <tr >
                                <td class="border-none">
                                        <p> التاريخ</p>
                                        <p> الفريق</p>
                                        <p> الباحث</p>
                                        <p> المشرف </p>
                                        <p> النتيجة</p>
                                </td>
                                <td >
                                  <p>  <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->date_visit1}} </span> </p>
                                  <p> <span class="ml-4 mr-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->team1}} </span> </p>
                                  <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> @if($researcher1 != null) {{$researcher1->first_name}} {{$researcher1->last_name}} @endif </span> </p>
                                  <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> @if($Supervisors1 != null) {{$Supervisors1->first_name}} {{$Supervisors1->last_name}}  @endif </span> </p>
                                  <p>  <span class="ml-4 underline underline--dotted padding-width-3   mt-4"> {{ $searchCase->result1}} </span> </p>
                                </td>
                                <td >
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->date_visit2}} </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->team2}} </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4">  @if($researcher2 != null) {{$researcher2->first_name}} {{$researcher2->last_name}} @endif  </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> @if($Supervisors2 != null) {{$Supervisors2->first_name}} {{$Supervisors2->last_name}}  @endif</span> </p>
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{ $searchCase->result2}}</span> </p>
                                </td>
                                <td class="border-l-none">
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->date_visit3}} </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> {{$searchCase->team3}} </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> @if($researcher3 != null) {{$researcher3->first_name}} {{$researcher3->last_name}} @endif  </span> </p>
                                    <p> <span class="ml-4 underline underline--dotted padding-width-3  mt-4">@if($Supervisors3 != null) {{$Supervisors3->first_name}} {{$Supervisors3->last_name}} @endif  </span> </p>
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3   mt-4"> {{ $searchCase->result3}} </span> </p>
                                    {{-- <p>  <span class="ml-4 underline underline--dotted padding-width-3  mt-4"> @if($searchCase->result3 !=  null && $searchCase->result3 == '١' ) تمت @elseif($searchCase->result3 !=  null && $searchCase->result3 == '٢')  لا يوجد فرد من افراد الاسره بالمنزل  @elseif($searchCase->result3 !=  null && $searchCase->result3 == '٣') اخري@endif </span> </p> --}}
                                </td>
                            </tr>
                            <tr>
                                <td>

                                 <div class="row mt-1"> <div class="col-md-5">  الزيارة التالية:  </div> <div class="col-md-4"> التاريخ:  </div>   </div>
                                <div class="row mt-2"> <div class="col-md-5"> </div> <div class="col-md-4">   الوقت:   </div> </div>
                                </td>
                                <td >
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3  ">{{$searchCase->date_next_visit1}} </span> </p>
                                    <p class="mb-0">  <span class="ml-4 underline underline--dotted padding-width-3  ">   {{$searchCase->date_next_visit1}}  </span> </p>
                                </td>
                                <td>
                                    <p>  <span class="ml-4 underline underline--dotted padding-width-3  ">{{$searchCase->date_next_visit2}} </span> </p>
                                    <p class="mb-0">   <span class="ml-4 underline underline--dotted padding-width-3 ">  {{$searchCase->date_next_visit2}} </span> </p>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                            <td class="border-none">
                          <p class="mb-0">  أكواد النتيجه  <br>  ١ = تمت  <br>  ٢ = لايوجد فرد من أفراد الأسرة بالمنزل   <br>  ٩ = اخري  <span class="ml-4 underline underline--dotted padding-width-3  "> {{ $searchCase->anther_result1 }}</span> (تذكر)</p>
                        </td>

                            </tr>
                        </table>

                    </td>
                       <td class="p-0">
                        <table class="w-100 ">
                            <tr>
                        <td class="border-none pt-0">
                           <div class="row col-md-12"> <span class="col-md-3 text-center"> يوم  <table class="table table-bordered-bold no-margin-button ml-2 text-xs" style="width:20%;"> <tr>   <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->date_Final_visit,-1,1)}} </th>  <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>" >{{substr($searchCase->date_Final_visit,-2,1)}} </th> </tr> </td> </table></span>    <span class="col-md-3 text-center">     شهر  <table class="table table-bordered-bold no-margin-button ml-2 text-xs" style="width:20%;"> <tr>    <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>" >{{substr($searchCase->month_Final_visit,-1,1)}} </th>  <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>"> {{substr($searchCase->month_Final_visit,-2,1)}} </th></tr> </td> </table>  </span> <span class="col-md-5 text-center">    سنة   <table class="table table-bordered-bold no-margin-button ml-2 text-xs" style="width:20%;"> <tr>   <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->year_Final_visit,-1,1)}} </th>  <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->year_Final_visit,-2,1)}} </th>  <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>">{{substr($searchCase->year_Final_visit,-3,1)}} </th>  <th class="<?php if(isset($searchCase->date_Final_visit)) echo  'pt-1 pb-1' ?>" >{{substr($searchCase->year_Final_visit,-4,1)}} </th> </tr> </td> </table>   </span> </div>
                           {{-- <div class="row col-md-12">   <table class="table table-bordered-bold no-margin-button ml-2" style="width:20%;"> <tr>  <th> {{$searchCase->date_Final_visit}} </th>  <th> </th> </tr> </td> </table>     <table class="table table-bordered-bold no-margin-button ml-2" style="width:20%;"> <tr>   <th> </th>  <th> </th> </tr> </td> </table>  <table class="table table-bordered-bold no-margin-button ml-2" style="width:20%;"> <tr>   <th> </th>  <th> </th> <th> </th> <th> </th> </tr> </td> </table></div> --}}
                           <div  class="row col-md-12 mt-2"> الفريق <div class="col-md-6"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-3" > <tr>   <th> </th>  <th> </th> </tr> </td> </table> </div>
                           <div  class="row col-md-12 mt-2"> الباحث <div class="col-md-6"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-3" > <tr>   <th> </th>  <th> </th> </tr> </td> </table> </div>
                           <div  class="row col-md-12 mt-2"> المشرف <div class="col-md-6"></div> <table class="table table-bordered-bold no-margin-button col-md-3"> <tr>   <th> </th>  <th> </th> </tr> </td> </table> </div>
                           <div  class="row col-md-12 mt-2"> النتيجة <div class="col-md-6"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-1" > <tr>   <th> </th>   </tr> </td> </table> </div>
                        </td>
                        </tr>
                        <tr>
                            <td class=" border-r-none border-l-none" style="height: 92px;" >
                                <div class="row col-md-12 mt-4"> اجمالي عدد الزيارات  <div class="col-md-5"> </div>   <table class="table table-bordered-bold col-md-1  no-margin-button text-xs"> <tr>   <th  class="<?php if(isset($searchCase->Total_number_visits)) echo  'pt-1 pb-1' ?>"> {{ $searchCase->Total_number_visits }} </th> </tr> </td> </table>    </div>
                            </td>

                        </tr>

                          <tr>

                        </tr>

                        </table>
                        </td>

                      </tr>


                    </tbody>
                  </table>
                </div>
                    <div class="table-responsive">
                    <table class="table table-bordered-bold mt-2">
                      <tr>
                          <td>
                              <p class="mt-4 mb-2"> الاسم </p>
                              <p> التاريخ</p>
                          </td>
                          <td>
                            <p class="text-center mb-0">  <br>  <span class="ml-4 underline  padding-width-3 "> المراجع الميداني</span> <br> /  <span class="pl-2 "></span> / {{Carbon::now()->format('Y')}} </p> <br>  <div class="row"> <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button col-md-6 " > <tr> <th> </th>  <th> </th> </tr> </td> </table> </div>
                        </td>
                        <td>
                            <p class="text-center mb-0">  <br>  <span class="ml-4 underline  padding-width-3 "> المراجعةالمكتبية </span> <br> / <span class="pl-2 "></span> / {{Carbon::now()->format('Y')}}</p>  <br>  <div class="row"> <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button col-md-6 " > <tr> <th> </th>  <th> </th> </tr> </td> </table>  </div>
                        </td>
                        <td>
                            <p class="text-center mb-0">   <br>  <span class="ml-4 underline  padding-width-3 ">الترميز  </span> <br> / <span class="pl-2 "></span>  / {{Carbon::now()->format('Y')}} </p> <br>  <div class="row"> <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button col-md-6" > <tr> <th> </th>  <th> </th> </tr> </td> </table>  </div>
                        </td>
                        <td>
                            <p class="text-center mb-0">  <br>  <span class="ml-4 underline  padding-width-3 ">  إدخال البيانات</span> <br> /  <span class="pl-2 "></span> / {{Carbon::now()->format('Y')}} </p> <br>   <div class="row"> <div class="col-md-3"></div> <table class="table table-bordered-bold no-margin-button col-md-6 " > <tr> <th> </th>  <th> </th> </tr> </td> </table>  </div>
                        </td>
                      </tr>
                  </table>
                   </div>
                  <table class="table table-bordered-bold ">
                    <tr>
                        <td >
                            <p> صيغة الموافقة</p>
                            <p>   السلام عليكم انا اسمي... وبنعمل بحث  عن الإحتياجات للقري الأكثر احتياجاً وهنسأل شويه أسئله عن كل فرد من افراد أسرتك وعن صحه المرأة الإنجابية
                                وعن مصارد الدخل  والقروض والتكافل الاجتماعي ومشروعات  الأسرة والغارمين وعايزينك تعرف ان مشاركتك معانا تطوعية وممكن  متجاوبش علي أي سؤال
                                والمعلومات اللي  انتي  هتقوليها  معانا  هتبقي سرية
                            </p>
                             <p class="mb-0"><b> حضرتك  موافق  تشارك  معانا </b> <span class="mr-4">  نعم  ...... ١  أكمل المقابلة </span> <span class="mr-4">   لا  .......  ٢  انهي المقابلة </span></p>

                        </td>
                    </tr>
                </table>

                     <p class="underline col-md-2 mt-4"  > المستندات الثبوتية</p>
                     <p>* صور بطاقة الرقم القومي ساريه وعلي العنوان الحالي للأفراد ١٨ سنة فأكثر. </p>
                     <p>* صور شهادة الميلاد لجميع أفراد الأسرة مميكنة ( شهادة كمبيوتر ) للأفراد أقل من ١٨ سنة.   </p>

                </div>
                <!-- /.card-body -->
            <div class="table-responsive">
                <table class="table table-bordered-bold mt-4 ">
                    <tr>
                        <td class="border-l-none" > </td>
                        <td class="border-l-none border-r-none" > </td>
                        <td class="border-l-none border-r-none" >  </td>
                        <td class="border-l-none border-r-none"></td>
                        <td class="border-l-none border-r-none">  أولاً: خصائص افراد الأسرة </td>
                        <td class="border-l-none border-r-none">  </td>

                    </tr>
                    <tr>
                        <td class="border-none"></td>

                        <td  class="text-center">
                            ١٠١
                        </td>
                        <td class="text-center">
                            ١٠٢
                        </td>
                        <td class="text-center">
                            ١٠٣
                        </td>

                        <td class="text-center">
                            ١٠٤
                        </td>
                        <td class="text-center">
                            ١٠٥
                        </td>
                    </tr>
                    <tr>
                        <td class="border-none"></td>
                        <td  class="text-center">
                           <p class=" m-0 text-center"> أفراد الأسرة المقيمين حالياً </p>
                           <p class="m-0">بالترتيب من الأكبر إلي  الأصغر</p>
                        </td>
                        <td  class="text-center">
                            الصلة برب الاسرة
                        </td>
                        <td class="text-center">
                            النوع
                        </td>
                        <td class="text-center">
                            التعليم
                        </td>
                        <td class="text-center">
                            أسباب ترك التعليم
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center text-bold">
                            م
                        </td>
                        <td class="text-center text-bold">
                           الاسم
                        </td>
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                        رب الأسرة<span class="underline underline--dotted padding-width-2"></span> ١
                                    </li>
                                    <li>
                                        زوج/زوجه<span class="underline underline--dotted padding-width-2"></span> ٢
                                    </li>
                                    <li>
                                        ابن/ابنه<span class="underline underline--dotted" style="padding-left: 34%;"></span> ٣
                                    </li>
                                    <li>
                                        أب/أم<span class="underline underline--dotted" style="padding-left: 40%;"></span> ٤
                                    </li>
                                    <li>
                                        حفيد/ة<span class="underline underline--dotted" style="padding-left: 33%;"></span> ٥
                                    </li>
                                    <li>
                                        زوج/زوجة أب<span class="underline underline--dotted" style="padding-left: 10%;"></span> ٦
                                    </li>
                                    <li>
                                        أخري تذكر<span class="underline underline--dotted " style="padding-left: 22%;"></span> ٩
                                    </li>
                                </ul>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    ذكر<span class="underline underline--dotted " style="padding-left: 34%;"></span> ١
                                </li>
                                <li class="mt-4">
                                    أنثي<span class="underline underline--dotted padding-width-2"></span> ٢
                                </li>

                            </ul>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    أقل من السن<span class="underline underline--dotted " style="padding-left: 16%;"></span> ١
                                </li>
                                <li>
                                    أمي<span class="underline underline--dotted " style="padding-left: 34%;"></span> ٢
                                </li>
                                <li>
                                    يقرأويكتب<span class="underline underline--dotted" style="padding-left: 23%;"></span> ٣
                                </li>
                                <li>
                                    في سن المدرسة ويدرس<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٤
                                </li>
                                <li>
                                    أقل من المتوسط<span class="underline underline--dotted" style="padding-left: 7%;"></span> ٥
                                </li>
                                <li>
                                    متوسط/فوق المتوسط<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٦
                                </li>
                                <li>
                                    جامعي فأعلي<span class="underline underline--dotted" style="padding-left: 4%;"></span> v
                                </li>
                                <li>
                                   في سن الجامعه ويدرس<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٨
                                </li>
                                <li>
                           <span>جميع الاكواد انتقل إلي ١٠٩ ماعدا كود ٢و٣و٥ <span>
                                </li>
                            </ul>
                        </td>
                        <td class="text-center">
                            <p> الاكواد اسفل الجدول</p>
                            <p class="mt-3"> يسمح بتعدد  الاجابات</p>
                        </td>
                    </tr>


                    @foreach($searchCase->family_members as  $index=>$family_member )
                    <tr>
                        <td class="text-center">
                            {{$index + 1}}
                        </td>
                        <td>
                            {{$family_member->family_person_name}}
                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td class=" <?php if ($family_member->Relationship_head_family != null)
                                 echo 'border-sm'?>">
                                  {{$family_member->Relationship_head_family}} </td> </tr>  </table>

                                    @if($family_member->Relationship_head_family_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$family_member->Relationship_head_family_anther}}</p>
                                @endif
                        </td>
                        <td>
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td class=" <?php if ($family_member->Gender != null)
                                echo 'border-sm'?>">
                                 {{$family_member->Gender}} </td> </tr>  </table>

                        </td>
                        <td>
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td class=" <?php if ($family_member->education != null)
                                echo 'border-sm'?>">
                                 {{$family_member->education}} </td> </tr>  </table>
                        </td>
                        <td>
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td class=" <?php if (substr($family_member->leave_education,-1,1) != null)
                                echo 'border-sm'?>">
                                {{ substr($family_member->leave_education,-1,1)}}</td>
                                <td class=" <?php if (substr($family_member->leave_education,-3,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->leave_education,-3,1)}}</td>
                                 <td class=" <?php if (substr($family_member->leave_education,-5,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->leave_education,-5,1)}}</td>
                                   <td class=" <?php if (substr($family_member->leave_education,-7,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->leave_education,-7,1)}}</td>
                                </tr>  </table>
                                 @if($family_member->leave_education_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$family_member->leave_education_anther}}</p>
                                @endif
                        </td>
                    </tr>
                    @endforeach

                    @for($i = count($searchCase->family_members); $i <=14 ; $i++)
                    <tr>
                        <td class="text-center">
                            {{ $i+1 }}
                        </td>
                        <td>
                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                         </td> </tr>  </table>


                        </td>
                        <td>
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                                 </td> </tr>  </table>

                        </td>
                        <td>
                            <table class=" no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                                 </td> </tr>  </table>
                        </td>
                        <td>
                            <table class=" no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                               </td>
                                <td > </td>
                                 <td ></td>
                                   <td ></td>
                                </tr>  </table>

                        </td>
                    </tr>
                    @endfor


                </table>
                </div>
                        <p class="text-bold underline col-md-4 ml-2 " > اكواد سؤال ١٠٥و١٠٧ أسباب ترك التعليم</p>
                        <div class="row">
                        <div class="col-md-4">
                            <ul style="list-style: none;">
                                <li>   A <span class="mr-4">كره المدرسة</span></li>
                                <li>   B <span class="mr-4"> صعوبه الوصول الي المدرسة</span></li>
                                <li>   C <span class="mr-4"> تكرار الرسوب /ضعف المستوي </span></li>
                                <li>   D <span class="mr-4">اصابة بمرض او اعاقه منعته </span></li>
                                <li>   E <span class="mr-4">الرغبة في تعلم صنعه </span></li>
                            </ul>
                        </div>
                        <div  class="col-md-4">
                            <ul style="list-style: none;">
                                <li>   F <span class="mr-4"> عدم رغبة الاسرة في تعليم ابناءها </span></li>
                                <li>  G <span class="mr-4"> تكاليف التعليم مرتفعه </span></li>
                                <li>  H <span class="mr-4">  عدم رغبة الفرد في التعليم</span></li>
                                <li>   I <span class="mr-4">تفادي الاختلاط </span></li>
                                <li>   G <span class="mr-4">العمل لمساعدة الاسرة ماليا </span></li>
                            </ul>
                        </div>
                        <div  class="col-md-4">
                            <ul style="list-style: none;">
                                <li>   K <span class="mr-4">اصبحت عائلا للاسرة</span></li>
                                <li>  L <span class="mr-4"> عدم الاحساس بأهميه التعليم </span></li>
                                <li>  M <span class="mr-4">  الزواج (إناث)</span></li>
                                <li>   X <span class="mr-4">أخري تذكر..... </span></li>
                            </ul>
                        </div>
                    </div>



                <div class="table-responsive margin-print-6"   >
                {{-- تابع خصائص افراد الاسره --}}
                <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td class="border-l-none" > </td>
                        <td class="border-l-none border-r-none"> </td>
                        <td class="border-l-none border-r-none"  style="width: 15%"> تابع خصائص افراد الاسره </td>
                        <td class="border-l-none border-r-none">  </td>
                        <td class="border-l-none border-r-none"></td>
                        <td class="border-l-none border-r-none">  </td>

                    </tr>
                    <tr>
                        <td class="border-none"></td>

                        <td  class="text-center">
                            ١٠٦
                        </td>
                        <td class="text-center">
                            ١٠٧
                        </td>
                        <td class="text-center">
                            ١٠٨
                        </td>

                        <td class="text-center">
                        للأفراد ١٥ سنة فأكثر <br>
                                ١٠٩
                        </td>
                        <td class="text-center">
                         للأفراد ١٥ سنة فأكثر <br>
                            ١١٠
                        </td>
                    </tr>
                    <tr>
                        <td class="border-none"></td>
                        <td  class="text-center">
                           <p class=" m-0 text-center"> لو توفرت فرصة للتعليم هل توافق علي التعليم </p>

                        </td>
                        <td class="text-center">
                            لماذا لا توافق علي التعليم؟
                        </td>
                        <td  class="text-center">
                            الحاله الاجتاعية
                        </td>
                        <td class="text-center">
                            العمل
                        </td>
                        <td class="text-center">
                            طبيعة حالة العمل
                        </td>

                    </tr>

                    <tr>
                        <td class="text-center text-bold">
                            م
                        </td>
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2"></span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2"></span> ٢
                                    </li>

                                </ul>

                                <p class="mt-4">  في حالة كود ١</p>
                                <p> انتقل الي ١٠٨</p>
                        </td>
                        <td class="text-center">
                                <p class="m-0" > الأكواد </p>
                                <p > أسفل الجدول </p>
                                <p> يسمح بتعدد الاجابات  </p>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    أقل من السن<span class="underline underline--dotted " style="padding-left: 16%;"></span> ١
                                </li>
                                <li>
                                    أعزب<span class="underline underline--dotted " style="padding-left: 34%;"></span> ٢
                                </li>
                                <li>
                                    متزوج<span class="underline underline--dotted" style="padding-left: 23%;"></span> ٣
                                </li>
                                <li>
                                    مطلق<span class="underline underline--dotted" style="padding-left: 30%;"></span> ٤
                                </li>
                                <li>
                                    ارمل<span class="underline underline--dotted" style="padding-left: 32%;"></span> ٥
                                </li>
                                <li>
                                   هجر<span class="underline underline--dotted" style="padding-left: 32%;"></span> ٦
                                </li>
                                <li>
                                  انفصال (للأقباط)<span class="underline underline--dotted" style="padding-left: 4%;"></span> v
                                </li>
                                <li>
                                  عقد قران<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٨
                                </li>
                                <li>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   يعمل<span class="underline underline--dotted padding-width-2"></span> ١
                                </li>
                                <li>
                                    <p class="mb-0 mt-4">لا بعمل/يبحث</p>
                                     عن عمل<span class="underline underline--dotted padding-width-2"></span> ٢
                                </li>

                            </ul>

                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    بأجر ومؤمن علية<span class="underline underline--dotted " style="padding-left: 22%;"></span> ١
                                </li>
                                <li>
                                    بأجر  وغير مؤمن علية<span class="underline underline--dotted " style="padding-left: 14%;"></span> ٢
                                </li>
                                <li>
                                    لحسابه ومؤمن علية<span class="underline underline--dotted" style="padding-left: 16%;"></span> ٣
                                </li>
                                <li>
                                    لحسابة وغير مؤمن علية<span class="underline underline--dotted" style="padding-left: 8%;"></span> ٤
                                </li>
                                <li>
                                    لا يعمل سابقاً او حالياً<span class="underline underline--dotted" style="padding-left: 14%;"></span> ٥
                                </li>
                                <li>
                                    خارج قوة العمل/القوة البشرية<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٦
                                </li>
                                <li>
                                    تطوع بجمعيات أهلية<span class="underline underline--dotted" style="padding-left: 12%;"></span> v
                                </li>
                                <li>
                                    لدي الأسرة بدون أجر<span class="underline underline--dotted" style="padding-left: 11%;"></span> ٨
                                </li>
                                <li>
                                    <p class="text-bold underline mb-0 mt-2 text-center" style="display: inline-block;"> في حالةالاختيارات ٥و٦ </p>
                                    <div class="m-0"> <p class="text-bold underline p-0  m-0 text-center" style="display: inline-block;"> انتقل الي السوال١١٦</p> </div>
                                </li>
                            </ul>
                                </td>

                    </tr>
                    @foreach($searchCase->family_members as  $index=>$family_member )
                    <tr>
                        <td class="text-center">
                            {{$index + 1}}
                        </td>
                        <td>
                            {{$family_member->If_there_opportunity_for_educations}}
                        </td>
                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if (substr($family_member->Why_dont_agree_education,-1,1) != null)
                                echo 'border-sm'?>">
                                {{ substr($family_member->Why_dont_agree_education,-1,1)}}</th>
                                <th class=" <?php if (substr($family_member->Why_dont_agree_education,-3,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->Why_dont_agree_education,-3,1)}}</th>
                                 <th class=" <?php if (substr($family_member->Why_dont_agree_education,-5,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->Why_dont_agree_education,-5,1)}}</th>
                                   <th class=" <?php if (substr($family_member->Why_dont_agree_education,-7,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->Why_dont_agree_education,-7,1)}}</th>
                                    <th class=" <?php if (substr($family_member->Why_dont_agree_education,-9,1) != null)
                                    echo 'border-sm'?>">{{ substr($family_member->Why_dont_agree_education,-9,1)}}</th>
                                </tr>  </table>


                        </td>
                        <td>
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->Social_status != null)
                                echo 'border-sm'?>">
                                 {{$family_member->Social_status}} </th> </tr>  </table>

                        </td>
                        <td>
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->work != null)
                                echo 'border-sm'?>">
                                 {{$family_member->work}} </th> </tr>  </table>
                        </td>
                        <td>

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->nature_work_situation != null)
                                echo 'border-sm'?>">
                                 {{$family_member->nature_work_situation}} </th> </tr>  </table>
                        </td>
                    </tr>

                    @endforeach



                    @for($i = count($searchCase->family_members); $i <=14 ; $i++)
                    <tr>
                        <td class="text-center">
                            {{ $i+1 }}
                        </td>
                        <td>
                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                         </td> </tr>  </table>


                        </td>
                        <td>
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                                 </td> </tr>  </table>

                        </td>
                        <td>
                            <table class=" no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                                 </td> </tr>  </table>
                        </td>
                        <td>
                            <table class=" no-margin-button ml-2 d-flex justify-content-center" > <tr>   <td>
                               </td>
                                <td > </td>
                                 <td ></td>
                                   <td ></td>
                                </tr>  </table>

                        </td>
                    </tr>
                    @endfor


                </table>
            </div>

                <p class="text-bold underline col-md-4 ml-2 " > اكواد سؤال ١٠٥و١٠٧ أسباب ترك التعليم</p>
                <div class="row">
                <div class="col-md-4">
                    <ul style="list-style: none;">
                        <li>   A <span class="mr-4">كره المدرسة</span></li>
                        <li>   B <span class="mr-4"> صعوبه الوصول الي المدرسة</span></li>
                        <li>   C <span class="mr-4"> تكرار الرسوب /ضعف المستوي </span></li>
                        <li>   D <span class="mr-4">اصابة بمرض او اعاقه منعته </span></li>
                        <li>   E <span class="mr-4">الرغبة في تعلم صنعه </span></li>
                    </ul>
                </div>
                <div  class="col-md-4">
                    <ul style="list-style: none;">
                        <li>   F <span class="mr-4"> عدم رغبة الاسرة في تعليم ابناءها </span></li>
                        <li>  G <span class="mr-4"> تكاليف التعليم مرتفعه </span></li>
                        <li>  H <span class="mr-4">  عدم رغبة الفرد في التعليم</span></li>
                        <li>   I <span class="mr-4">تفادي الاختلاط </span></li>
                        <li>   G <span class="mr-4">العمل لمساعدة الاسرة ماليا </span></li>
                    </ul>
                </div>
                <div  class="col-md-4">
                    <ul style="list-style: none;">
                        <li>   K <span class="mr-4">اصبحت عائلا للاسرة</span></li>
                        <li>  L <span class="mr-4"> عدم الاحساس بأهميه التعليم </span></li>
                        <li>  M <span class="mr-4">  الزواج (إناث)</span></li>
                        <li>   X <span class="mr-4">أخري تذكر..... </span></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive margin-print-6" >
                  {{-- تابع خصائص افراد الاسره --}}
                  <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td class="border-l-none" > </td>
                        <td class="border-l-none border-r-none"> </td>
                        <td class="border-l-none border-r-none">  </td>
                        <td class="border-l-none border-r-none"> تابع خصائص افراد الاسره </td>
                        <td class="border-l-none border-r-none" >  </td>
                        <td class="border-l-none border-r-none"></td>
                        {{-- <td class="border-l-none border-r-none">  </td> --}}

                    </tr>
                    <tr>
                        <td class="border-l-none  border-b-none" > </td>
                        <td class=" border-b-none" > </td>
                        <td class="border-l-none border-r-none"> </td>
                        <td class="border-l-none border-r-none"> للأفراد ١٥ سنة فأكثر </td>
                        <td class="border-l-none  border-r-none"> </td>
                        <td class="  border-r-none"> </td>
                        {{-- <td class="border-l-none border-r-none">  </td> --}}

                    </tr>
                    <tr>
                        <td class="border-none"></td>

                        <td class="border-b-none border-t-none">  </td>

                        </td>

                        <td  class="text-center">
                            ١١١
                        </td>
                        <td class="text-center">
                            ١١٢
                        </td>
                        <td class="text-center">
                            ١١٣
                        </td>

                        <td class="text-center">
                            ١١٤
                        </td>

                    </tr>
                    <tr >
                        <td class="text-center text-bold border-none">  م</td>
                        <td  class="text-center border-t-none" style="width:18%;">
                            <p class="text-bold"> أفراد الأسرة المقيمين حالياً بالترتيب من الأكبر الي الأصغر </p>
                        </td>
                        <td class="text-center">
                            الإنتظام في العمل
                         </td>
                        <td class="text-center">
                           قطاع العمل
                        </td>
                        <td  class="text-center" style="width: 30%;">
                           المهنة الرئيسية للفرد
                        </td>
                        <td class="text-center">
                            قطاع النشاط الاقتصادي
                        </td>


                    </tr>

                    <tr>
                        <td class="text-center text-bold mt-4">
                            م
                        </td>
                        <td class="text-center">


                                <p class="text-center text-bold mt-4"> الأسم</p>

                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   دائم<span class="underline underline--dotted " style="padding-left: 26%;"></span> ١
                                </li>
                                <li>
                                    بعض الوقت<span class="underline underline--dotted " style="padding-left: 13%;"></span> ٢
                                </li>
                                <li>
                                    غير دائم<span class="underline underline--dotted" style="padding-left: 17%;"></span> ٣
                                </li>
                                <li>
                                    موسمي<span class="underline underline--dotted" style="padding-left: 17%;"></span> ٤
                                </li>

                            </ul>


                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   حكومي/عام<span class="underline underline--dotted " style="padding-left: 16%;"></span> ١
                                </li>
                                <li>
                                    خاص/استثماري/مشترك<span class="underline underline--dotted " style="padding-left: 4%;"></span> ٢
                                </li>
                                <li>
                                    خارج المنشأت<span class="underline underline--dotted" style="padding-left: 8%;"></span> ٣
                                </li>
                                <li>
                                    أخري<span class="underline underline--dotted" style="padding-left: 30%;"></span> ٤
                                </li>
                                <li>
                                    جمعيات أهلية<span class="underline underline--dotted" style="padding-left: 7%;"></span> ٥
                                </li>
                            </ul>
                        </td>
                        <td class="text-center" style="width: 11%;">
                            <p class="text-bold"> أذكر المهنة بالتفصيل</p>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    الزراعه<span class="underline underline--dotted " style="padding-left: 22%;"></span> ١
                                </li>
                                <li>
                                    القطاع الغذائي والأغذية المصنعة<span class="underline underline--dotted " style="padding-left: 3%;"></span> ٢
                                </li>
                                <li>
                                    القطاع الصناعي<span class="underline underline--dotted" style="padding-left: 3%;"></span> ٣
                                </li>
                                <li>
                                    القطاع التجاري<span class="underline underline--dotted" style="padding-left: 6%;"></span> ٤
                                </li>
                                <li>
                                    القطاع الخدمي<span class="underline underline--dotted" style="padding-left: 4%;"></span> ٥
                                </li>
                                <li>
                                    قطاع التشييد والبناء<span class="underline underline--dotted" style="padding-left: 3%;"></span> ٦
                                </li>
                                <li>
                                    أعمال حرفية<span class="underline underline--dotted" style="padding-left: 8%;"></span> v
                                </li>
                    </tr>
                    @foreach($searchCase->family_members as  $index=>$family_member )
                    <tr>
                        <td class="text-center">
                            {{$index + 1}}
                        </td>
                        <td>
                            {{$family_member->family_person_name}}
                        </td>
                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->regularity_at_work != null)
                                echo 'border-sm'?>">
                                 {{$family_member->regularity_at_work}} </th> </tr>  </table>


                        </td>
                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->business_sector != null)
                                echo 'border-sm'?>">
                                 {{$family_member->business_sector}} </th> </tr>  </table>

                                @if($family_member->business_sector_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$family_member->business_sector_anther}}</p>
                                @endif
                        </td>
                        <td class="text-center">
                            <span class="underline underline--dotted" style="padding-left: 4%;padding-right: 4%;">
                                {{$family_member->person_main_occupation}} </span>



                        </td>
                        <td class="text-center">

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->nature_work_situation != null)
                                echo 'border-sm'?>">
                                 {{$family_member->sector_economic_activity}} </th> </tr>  </table>
                        </td>
                    </tr>

                    @endforeach

                    @for($i = count($searchCase->family_members); $i <=14 ; $i++)
                    <tr>
                        <td class="text-center">
                            {{ $i+1 }}
                        </td>
                        <td>

                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th>

                                 </th> </tr>  </table>


                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th>

                                </th> </tr>  </table>


                        </td>
                        <td class="text-center">
                            <span class="underline underline--dotted" style="padding-left: 4%;padding-right: 4%;">
                              </span>



                        </td>
                        <td class="text-center">

                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th>

                                 </th> </tr>  </table>
                        </td>
                    </tr>
                    @endfor
                </table>
                </div>




        {{-- تابع خصائص افراد الاسره --}}
                <div class="table-responsive margin-print-5" >
                <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td class="border-l-none" > </td>
                        <td class="border-l-none border-r-none"> </td>
                        <td class="border-l-none border-r-none">  </td>
                        <td class="border-l-none border-r-none">  </td>
                        <td class="border-l-none border-r-none" style="width: 15%">تابع خصائص افراد الاسره</td>
                        <td class="border-l-none border-r-none" >  </td>
                        <td class="border-l-none border-r-none"></td>
                        <td class="border-l-none border-r-none">  </td>
                        <td class="border-l-none border-r-none">  </td>
                    </tr>
                    <tr>
                        <td  class="border-l-none"></td>
                        <td class="border-l-none border-r-none"></td>
                        <td  class="border-l-none border-r-none">
                            للأفراد ١٥ سنه فأكثر
                        </td>
                        <td class="border-r-none border-r-none"></td>
                        <td class="border-r-none border-r-none"></td>
                        <td class="border-r-none border-r-none"></td>
                        <td class="border-r-none border-r-none"></td>
                        <td class="border-r-none border-r-none"></td>
                        <td class="border-r-none"></td>
                    </tr>
                    <tr>
                        <td class="border-none"></td>

                        <td  class="text-center">
                            ١١٥
                        </td>
                        <td class="text-center">
                            ١١٦
                        </td>
                        <td class="text-center">
                            ١١٧
                        </td>

                        <td class="text-center">
                            ١١٨
                        </td>
                        <td class="text-center">
                            ١١٩
                        </td>
                        <td class="text-center">
                            ١٢٠
                        </td>
                        <td class="text-center">
                            ١٢١
                        </td>
                        <td class="text-center">
                            ١٢٢
                        </td>
                    </tr>
                    <tr>
                        <td class="border-none"></td>
                        <td  class="text-center">
                           <p class=" m-0 text-center"> هل الفرد لديه مهارات عملية اخري ولا يمارسها </p>

                        </td>
                        <td class="text-center">
                          ما هي المهارات العملية
                        </td>
                        <td  class="text-center">
                           التأمينات الاجتماعية
                        </td>
                        <td class="text-center">
                            التأمين الصحي
                        </td>
                        <td class="text-center" style="width: 12%;">
                            هل (الفرد) يعاني من أمراض مزمنة
                        </td>
                        <td class="text-center">
                           حدد المرض المزمن
                        </td>
                        <td class="text-center">
                            هل (الفرد) يعاني من أي إعاقة
                        </td>
                        <td class="text-center">
                            مسجون
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center text-bold">
                            م
                        </td>
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2"></span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2"></span> ٢
                                    </li>

                                </ul>

                                <p class="mt-4"> اذا كان الاجابة</p>
                                <p> كود ٢ انتقل الي ١١٨</p>
                        </td>

                            <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       سباكه<span class="underline underline--dotted " style="padding-left: 16%;"></span> A
                                    </li>
                                    <li>
                                        نجارة<span class="underline underline--dotted " style="padding-left: 16%;"></span> B
                                    </li>
                                    <li>
                                        نقاشة<span class="underline underline--dotted" style="padding-left: 16%;"></span> C
                                    </li>
                                    <li>
                                        ميكانيكا<span class="underline underline--dotted" style="padding-left: 16%;"></span> D
                                    </li>
                                    <li>
                                        سمكرة<span class="underline underline--dotted" style="padding-left: 16%;"></span> E
                                    </li>
                                    <li>
                                        كهربا<span class="underline underline--dotted" style="padding-left: 16%;"></span> F
                                    </li>
                                    <li>
                                        تصليح اجهزة<span class="underline underline--dotted" style="padding-left: 16%;"></span> G
                                    </li>
                                    <li>
                                        مبلط<span class="underline underline--dotted" style="padding-left: 16%;"></span> H
                                    </li>
                                    <li>
                                        محارة<span class="underline underline--dotted" style="padding-left: 16%;"></span> I
                                    </li>
                                    <li>
                                        اخري<span class="underline underline--dotted" style="padding-left: 16%;"></span> X
                                    </li>
                                    <li>
                            </td>

                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   مشترك<span class="underline underline--dotted " style="padding-left: 16%;"></span> ١
                                </li>
                                <li>
                                    مستفيد<span class="underline underline--dotted " style="padding-left: 34%;"></span> ٢
                                </li>
                                <li>
                                    مشترك ومستفيد<span class="underline underline--dotted" style="padding-left: 16%;"></span> ٣
                                </li>
                                <li>
                                    غير مشترك وغير مستفيد<span class="underline underline--dotted" style="padding-left: 30%;"></span> ٤
                                </li>
                                <ul>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   يوجد<span class="underline underline--dotted " style="padding-left: 20%;"></span> ١
                                </li>
                                <li>
                                    لا يوجد<span class="underline underline--dotted " style="padding-left: 14%;"></span> ٢
                                </li>
                                <ul>

                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                   نعم<span class="underline underline--dotted " style="padding-left: 20%;"></span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left: 20%;"></span> ٢
                                </li>
                                <ul>
                                    <p class="mt-4"> اذا كان الاجابة</p>
                                    <p> كود ٢ انتقل الي ١١٨</p>

                        </td>
                        <td class="text-center" style="width:">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    قلب مزمن<span class="underline underline--dotted " style="padding-left: 22%;"></span> A
                                </li>
                                <li>
                                    تنفس مزمن<span class="underline underline--dotted " style="padding-left: 14%;"></span> B
                                </li>
                                <li>
                                    فقرات مزمنة<span class="underline underline--dotted" style="padding-left: 16%;"></span> C
                                </li>
                                <li>
                                    أمراض كلي<span class="underline underline--dotted" style="padding-left: 8%;"></span> D
                                </li>
                                <li>
                                    كبد مزمن<span class="underline underline--dotted" style="padding-left: 14%;"></span> E
                                </li>
                                <li>
                                    التهاب اعصاب مزمن<span class="underline underline--dotted" style="padding-left: 7%;"></span> F
                                </li>
                                <li>
                                    سل<span class="underline underline--dotted" style="padding-left: 30%;"></span> G
                                </li>
                                <li>
                                    جذام<span class="underline underline--dotted" style="padding-left: 25%;"></span> H
                                </li>
                                <li style="font-size: 15px;">
                                    الفلاريا (داء الفيل)<span class="underline underline--dotted" style="padding-left: 9%;"></span> I
                                </li>
                                <li>
                                    سرطان<span class="underline underline--dotted" style="padding-left: 15%;"></span> J
                                </li>
                                <li>
                                    نقص المناعة (إيدز)<span class="underline underline--dotted" style="padding-left: 21%;"></span> K
                                </li>
                                <li>
                                    إكتئاب حاد<span class="underline underline--dotted" style="padding-left: 14%;"></span> L
                                </li>
                                <li>
                                    أخري تذكر<span class="underline underline--dotted" style="padding-left: 11%;"></span> X
                                </li>

                            </ul>
                                </td>
                            <td class="text-center">
                                <ul style="list-style:none;margin:0;padding: 0;">
                                    <li>
                                        نعم<span class="underline underline--dotted " style="padding-left: 20%;"></span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted " style="padding-left: 28%;"></span> ٢
                                    </li>
                                    <ul>
                                        <p class="mt-4"> اذا كان الاجابة</p>
                                        <p class="m-0"> كود ١ يتم استيفاء استمارة</p>
                                        <p class="m-0"> لكل فرد معاق</p>

                            </td>
                            <td class="text-center">
                                <ul style="list-style:none;margin:0;padding: 0;">
                                    <li>
                                        نعم<span class="underline underline--dotted " style="padding-left: 20%;"></span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted " style="padding-left: 28%;"></span> ٢
                                    </li>
                                    <ul>


                            </td>

                    </tr>
                    @foreach($searchCase->family_members as  $index=>$family_member )
                    <tr>
                        <td class="text-center">
                            {{$index + 1}}
                        </td>

                        <td style="width: 14%;" class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->other_practical_skills != null)
                                echo 'border-sm'?>">
                                 {{$family_member->other_practical_skills}} </th> </tr>  </table>
                        </td>
                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->What_are_practical_skills != null)
                                echo 'border-sm'?>">
                                 {{$family_member->What_are_practical_skills}} </th> </tr>  </table>

                                 @if($family_member->What_are_practical_skills_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$family_member->What_are_practical_skills_anther}}</p>
                                @endif
                        </td>
                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->Social_Security != null)
                                echo 'border-sm'?>">
                                 {{$family_member->Social_Security}} </th> </tr>  </table>
                        </td>
                        <td class="text-center">

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->health_insurance != null)
                                echo 'border-sm'?>">
                                 {{$family_member->health_insurance}} </th> </tr>  </table>
                        </td>
                        <td class="text-center">

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->chronic_diseases != null)
                                echo 'border-sm'?>">
                                 {{$family_member->chronic_diseases}} </th> </tr>  </table>
                        </td>
                        <td class="text-center"  style="width: 16%;">

                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->Define_chronic_disease != null)
                                echo 'border-sm'?>">
                                 {{$family_member->Define_chronic_disease}} </th> </tr>  </table>

                                  @if($family_member->Define_chronic_disease_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$family_member->Define_chronic_disease_anther}}</p>
                                @endif
                        </td>
                        <td class="text-center">

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->the_person_handicapped != null)
                                echo 'border-sm'?>">
                                 {{$family_member->the_person_handicapped}} </th> </tr>  </table>
                        </td>

                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th class=" <?php if ($family_member->Jailed != null)
                                echo 'border-sm'?>">
                                 {{$family_member->Jailed}} </th> </tr>  </table>
                        </td>
                    </tr>

                    @endforeach

                    @for($i = count($searchCase->family_members); $i <=14 ; $i++)
                    <tr>
                        <td class="text-center">
                            {{ $i+1 }}
                        </td>

                        <td style="width: 14%;" class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >

                                </th> </tr>  </table>
                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >
                            </th> </tr>  </table>


                        </td>
                        <td class="text-center">
                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >

                               </th> </tr>  </table>
                        </td>
                        <td class="text-center">

                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >

                                 </th> </tr>  </table>
                        </td>
                        <td class="text-center">

                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >

                                 </th> </tr>  </table>
                        </td>
                        <td class="text-center"  style="width: 16%;">

                            <table class="no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >
                                  </th> </tr>  </table>


                        </td>
                        <td class="text-center">

                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >
                                 </th> </tr>  </table>
                        </td>

                        <td class="text-center">
                            <table class="  no-margin-button ml-2 d-flex justify-content-center" > <tr>   <th >
                                 </th> </tr>  </table>
                        </td>
                    </tr>
                    @endfor
                </table>
                </div>
                <div class="text-center text-bold margin-print-8" > ثانياً: خصائص مسكن الأسرةوالممتلكات ( كل أفراد الأسرة: الزوج والزوجة والأبناء وغيرهم إن وجد)</div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="table-responsive">
                        <table class="table table-bordered-bold mt-4">
                            @foreach($searchCase->family_residences as  $index=>$family_residence )
                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠١</th></tr> </table>
                                  <p class="ml-2">  عدد حجرات المسكن (تحسب الصالة حجرة)
                                    مساحة المنزل بالمتر المربع</p>
                                </td>
                                <td>
                                    <div class="row mt-2">
                                        <table class="no-margin-button  d-flex justify-content-center ml-4"> <tr><th class="pl-4 pr-4"> {{$family_residence->number_rooms_the_dwelling}}</th></tr> </table>
                                    </div>
                                    <div class="row mt-2">
                                        <table class="no-margin-button  d-flex justify-content-center  ml-4"> <tr><th class="pl-4 pr-4"> {{$family_residence->number_rooms_the_dwelling2}}</th></tr> </table> م
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٢</th></tr> </table>
                                  <p class="ml-4">  نوع المسكن؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                           فيلا أواكثر من شقة<span class="underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> @if($family_residence->housing_type =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           شقة مستقلة<span class="underline underline--dotted " style="padding-left: 15%;padding-right:15%; "> @if($family_residence->housing_type =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                           منزل ريفي<span class="underline underline--dotted" style="padding-left: 18%;padding-right:18%;">@if($family_residence->housing_type =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                        <li>
                                            غرفة في وحدة سكنيه<span class="underline underline--dotted" style="padding-left: 2%;padding-right:1%;">@if($family_residence->housing_type =='٤') <i class="fas fa-check"></i> @endif  </span> ٤
                                        </li>
                                        <li>
                                            غرفة مستقلة أو أكثر<span class="underline underline--dotted" style="padding-left: 4%;padding-right:3%;"> @if($family_residence->housing_type =='٥') <i class="fas fa-check"></i> @endif </span> ٥
                                        </li>
                                        <li>
                                            عشة<span class="underline underline--dotted" style="padding-left: 27%;padding-right:27%;"> @if($family_residence->housing_type =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted" style="padding-left: 27%;padding-right:27%;"> @if($family_residence->housing_type =='v') <i class="fas fa-check"></i> @endif</span> v
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٣</th></tr> </table>
                                  <p class="ml-4">  ملكية المسكن؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                           إيجار<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%;"> @if($family_residence->home_ownership =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                          تمليك<span class="underline underline--dotted " style="padding-left: 15%;padding-right:15%; "> @if($family_residence->home_ownership =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted" style="padding-left: 18%;padding-right:18%;">@if($family_residence->home_ownership =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٤</th></tr> </table>
                                  <p class="ml-4">  نوع حوائط المسكن؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                           طوب وأسمنت/مسلح/حجارة<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%;"> @if($family_residence->type_walls_dwelling =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted " style="padding-left: 15%;padding-right:15%; "> @if($family_residence->type_walls_dwelling =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>

                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٥</th></tr> </table>
                                  <p class="ml-4">  نوع أرضية المسكن؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                           بلاط/رخام/سيراميك<span class="underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> @if($family_residence->Type_flooring =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                          ترابية أو أخري<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%; "> @if($family_residence->Type_flooring =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li class="mt-2 mb-1">
                                            خشب/قنالتكس/فينيل<span class="underline underline--dotted" style="padding-left: 18%;padding-right:18%;">@if($family_residence->Type_flooring =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                        <li>
                                            أسمنت<span class="underline underline--dotted" style="padding-left: 15%;padding-right:15%;">@if($family_residence->Type_flooring =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٦</th></tr> </table>
                                  <p class="ml-4">  نوع سقف المسكن؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                          اسمنت<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%;"> @if($family_residence->type_roof =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            خشب/قنالتكس/فينيل<span class="underline underline--dotted " style="padding-left: 6%;padding-right:6%; "> @if($family_residence->type_roof =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                          أخري<span class="underline underline--dotted" style="padding-left: 20%;padding-right:20%;">@if($family_residence->type_roof =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٧</th></tr> </table>
                                  <p class="ml-4">  المادة المستخدمة في سقف المنزل؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                          جريد وقش<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%;"> @if($family_residence->material_roof_house =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            طين<span class="underline underline--dotted " style="padding-left: 23%;padding-right:23%; "> @if($family_residence->material_roof_house =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                          الواح خشبية<span class="underline underline--dotted" style="padding-left: 20%;padding-right:20%;">@if($family_residence->material_roof_house =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                        <li>
                                            الأسمنت المسلح<span class="underline underline--dotted" style="padding-left: 12%;padding-right:12%;">@if($family_residence->material_roof_house =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                        </li>
                                        <li>
                                            الواح صاج<span class="underline underline--dotted" style="padding-left: 15%;padding-right:15%;">@if($family_residence->material_roof_house =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                        </li>
                                        <li>
                                           أخري<span class="underline underline--dotted" style="padding-left: 25%;padding-right:25%;">@if($family_residence->material_roof_house =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                            <tr class="mb-0">
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٨</th></tr> </table>
                                  <p class="ml-4">  المادة المستخدمة في حوائط المنزل؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                            الطوب اللبن<span class="underline underline--dotted " style="padding-left: 14%;padding-right:14%;"> @if($family_residence->material_wall_house =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            الطوب الأحمر والطين<span class="underline underline--dotted " style="padding-left:23%;padding-right:23%; "> @if($family_residence->material_wall_house =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            الطوب الأحمر والأسمنت<span class="underline underline--dotted" style="padding-left: 18%;padding-right:18%;">@if($family_residence->material_wall_house =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                        <li>
                                            الطوب الابيض والأسمنت<span class="underline underline--dotted" style="padding-left: 17%;padding-right:17%;">@if($family_residence->material_wall_house =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                        </li>
                                        <li>
                                            محارة<span class="underline underline--dotted" style="padding-left: 24%;padding-right:24%;">@if($family_residence->material_wall_house =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted" style="padding-left: 25%;padding-right:25%;">@if($family_residence->material_wall_house =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢٠٩</th></tr> </table>
                                  <p class="ml-4"> مصدر المياه؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                           شبكة عامة<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->water_source =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            طلمبة<span class="underline underline--dotted " style="padding-left:23%;padding-right:23%; "> @if($family_residence->water_source =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                           اخري تذكر<span class="underline underline--dotted" style="padding-left: 18%;padding-right:18%;">@if($family_residence->water_source =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>

                                        @if($family_residence->water_source_anther)
                                            <p class="mt-2 mb-0">   اخري :  {{$family_residence->water_source_anther}}</p>
                                        @endif
                                    </ul>
                                </td>
                            </tr>




                            @endforeach
                        </table>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                        <table class="table table-bordered-bold mt-4 mb-0">
                            @foreach($searchCase->family_residences as  $index=>$family_residence )
                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٠</th></tr> </table>
                                  <p class="ml-4"> وجود دورة مياه؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                          خاصة<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->Having_toilet =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            مشتركة<span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; "> @if($family_residence->Having_toilet =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                          لا يوجد<span class="underline underline--dotted" style="padding-left: 16%;padding-right:16%;">@if($family_residence->Having_toilet =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>

                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١١</th></tr> </table>
                                  <p class="ml-4"> نوع دورة مياه؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                          افرنجي سيفون<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->toilet_type =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            بلدي سيفون<span class="underline underline--dotted " style="padding-left:20%;padding-right:20%; "> @if($family_residence->toilet_type =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            بلدي بدون سيفون<span class="underline underline--dotted" style="padding-left: 14%;padding-right:14%;">@if($family_residence->toilet_type =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted" style="padding-left: 20%;padding-right:20%;">@if($family_residence->toilet_type =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                        </li>

                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٢</th></tr> </table>
                                  <p class="ml-4"> اتصال السكن بالمياه؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                         حنفية داخل المنزل<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->Water_connection =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            حنفية خارج المنزل<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($family_residence->Water_connection =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            غير متصل<span class="underline underline--dotted" style="padding-left: 20%;padding-right:20%;">@if($family_residence->Water_connection =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٣</th></tr> </table>
                                  <p class="ml-4"> هل المنزل متصل بالكهرباء</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        متصل<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->connected_electricity =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           غير متصل<span class="underline underline--dotted " style="padding-left:12%;padding-right:12%; "> @if($family_residence->connected_electricity =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>

                                    </ul>
                                </td>
                            </tr>



                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٤</th></tr> </table>
                                  <p class="ml-4">إيه نوع الصرف الصحي؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        شبكه عامة<span class="underline underline--dotted " style="padding-left: 13%;padding-right:13%;"> @if($family_residence->type_sewage =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                          شبكة خاصة<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($family_residence->type_sewage =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>

                                        <li>
                                         ترنش<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($family_residence->type_sewage =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                        </li>

                                        <li>
                                            لا يوجد<span class="underline underline--dotted " style="padding-left:18%;padding-right:18%; "> @if($family_residence->type_sewage =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                        </li>

                                        <li>
                                            أخري<span class="underline underline--dotted " style="padding-left:20%;padding-right:20%; "> @if($family_residence->type_sewage =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                        </li>

                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٥</th></tr> </table>
                                  <p class="ml-4"> وجود مطبخ؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        خاصة<span class="underline underline--dotted " style="padding-left: 16%;padding-right:16%;"> @if($family_residence->Having_kitchen =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           مشتركة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($family_residence->Having_kitchen =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            لا يوجد<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($family_residence->Having_kitchen =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                         </li>
                                    </ul>
                                </td>
                            </tr>



                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٦</th></tr> </table>
                                  <p class="ml-4">نوع الوقود المستخدم في المطبخ؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        بوتجاز<span class="underline underline--dotted " style="padding-left: 18%;padding-right:18%;"> @if($family_residence->used_kitchen_fuel =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           غاز طبيعي<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($family_residence->used_kitchen_fuel =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            كروسين<span class="underline underline--dotted " style="padding-left:14%;padding-right:15%; "> @if($family_residence->used_kitchen_fuel =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                         </li>
                                         <li>
                                            كهرباء<span class="underline underline--dotted " style="padding-left:18%;padding-right:18%; "> @if($family_residence->used_kitchen_fuel =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                         </li>
                                         <li>
                                            أخري<span class="underline underline--dotted " style="padding-left:18%;padding-right:18%; "> @if($family_residence->used_kitchen_fuel =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                         </li>
                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٧</th></tr> </table>
                                  <p class="ml-4">وسيله جمع  القمامة؟</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        جامع للقمامة<span class="underline underline--dotted " style="padding-left: 8%;padding-right:8%;"> @if($family_residence->Garbage_collection_method =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           شركة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($family_residence->Garbage_collection_method =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            أخري<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($family_residence->Garbage_collection_method =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                         </li>
                                    </ul>
                                </td>
                            </tr>


                            <tr>
                                <td class="p-0">
                                    <table class="no-margin-button p-0"> <tr><th class="p-1"> ٢١٨</th></tr> </table>
                                  <p class="ml-4"> هل توجد لدي الأسرة بطاقة تموين مميكنة؟</p>
                                  <p class="ml-4">(في حالة البطاقة الورقية يعتبر لا يوجد)</p>
                                </td>
                                <td>
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        نعم<span class="underline underline--dotted " style="padding-left: 8%;padding-right:8%;"> @if($family_residence->mechanical_ration_cards =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                           لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($family_residence->mechanical_ration_cards =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                        <li>
                                            مقيد ببطاقة أحد الوالدين<span class="underline underline--dotted " style="padding-left:6%;padding-right:6%; "> @if($family_residence->mechanical_ration_cards =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                         </li>
                                    </ul>
                                    <p class="mt-4"> (انتقل لسؤال ٢٢٠ حالة إختيار ٢أو٣)</p>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered-bold border-t-none" style="height:210px;">
                            <tr>
                                <td class="p-0" >
                                    <table class="no-margin-button p-0 "> <tr ><th class="border-r-none border-t-none p-1"> ٢١٩</th></tr> </table>
                                   <p class="pb-0 mb-0 ml-4 mt-2 mb-2"> رقم بطاقة التموين:</p>
                                    <table class="table table-bordered-bold no-margin-button ml-4 col-md-3" > <tr>
                                        <th class=" <?php if (substr($family_residence->ration_card_number, -12,1) != null)
                                            echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -12,1) }} </th>

                                        <th class="<?php if (substr($family_residence->ration_card_number, -11,1) != null)
                                        echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -11,1) }} </th>

                                        <th class="<?php if (substr($family_residence->ration_card_number, -10,1) != null)
                                            echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -10,1) }} </th>

                                        <th class="<?php if (substr($family_residence->ration_card_number, -9,1) != null)
                                            echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -9,1) }} </th>

                                            <th class="<?php if (substr($family_residence->ration_card_number, -8,1) != null)
                                                echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -8,1) }} </th>

                                                <th class="<?php if (substr($family_residence->ration_card_number, -7,1) != null)
                                                    echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -7,1) }} </th>

                                                    <th class="<?php if (substr($family_residence->ration_card_number, -6,1) != null)
                                                        echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -6,1) }} </th>

                                                        <th class="<?php if (substr($family_residence->ration_card_number, -5,1) != null)
                                                            echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -5,1) }} </th>

                                                                <th class="<?php if (substr($family_residence->ration_card_number, -4,1) != null)
                                                                echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -4,1) }} </th>

                                                                    <th class="<?php if (substr($family_residence->ration_card_number, -3,1) != null)
                                                                    echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -3,1) }} </th>

                                                                        <th class="<?php if (substr($family_residence->ration_card_number, -2,1) != null)
                                                                        echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -2,1) }} </th>

                                                                            <th class="<?php if (substr($family_residence->ration_card_number, -1,1) != null)
                                                                            echo 'border-sm'?>"> {{substr($family_residence->ration_card_number, -1,1) }} </th>


                                                                                     </tr> </table>

                                    <p class="ml-4 mt-2"> اسم مكتب التموين (أن وجد) <span class="underline underline--dotted ml-2 " style="padding-left:6%;padding-right:6%; "> {{$family_residence->Supply_office_name}}</span></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
            <div class="row  text-bold mt-4 margin-print-2">
             <div class="col-md-3"> <table class="table table-bordered-bold col-md-2 no-margin-button p-0 mr-4 text-center"> <tr><th class="p-0 "> ٢٢٠</th></tr> </table> </div> <div class=" offset-md-1 col-md-7"> ممتلكات الأسرة (كل أفراد الأسرة: الزوج والزوجةوالأبناء وغيرهم إن وجد) </div> </div>
            <div class="table-responsive">

                    {{-- تابع خصائص افراد الاسره --}}
                    <table class="table table-bordered-bold mt-4">

                        <tr>
                            <td >
                                البند
                            </td>

                            <td  class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>
                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>


                        </tr>
                        <tr>
                            <td> ثلاجة</td>
                            <td  class="text-center">
                                @if($family_residence->Refrigerator == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Refrigerator == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>
                            <td  class="text-center">
                                ارض زراعية
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Agricultural_Land == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Agricultural_Land == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               تاكسي
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Agricultural_Land == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Agricultural_Land == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                 توكتوك
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Tuk_Tuk == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Tuk_Tuk == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                موتوسيكل/تريسيكل
                           </td>
                           <td  class="text-center">
                               @if($family_residence->motorcycle == '١')
                               <i class="fas fa-check"></i>
                               @endif ١
                           </td>
                           <td class="text-center">
                               @if($family_residence->motorcycle == '٢')
                               <i class="fas fa-check"></i>
                               @endif ٢
                           </td>

                        </tr>
                        <tr>
                            <td> تكيف</td>
                            <td  class="text-center">
                                @if($family_residence->adaptation == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->adaptation == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>
                            <td  class="text-center">
                                عدد اللافدنة
                            </td>
                            <td  class="text-center border-l-none">
                                <span class="underline underline--dotted " style="padding-left: 10%;padding-right:10%;">
                                      {{$family_residence->number_acres1}}
                                </span>
                            </td>
                            <td  class="text-center  border-r-none" >
                            </td>

                            <td  class="text-center border-b-none">
                               سيارة نصف نقل
                            </td>
                            <td  class="text-center">
                                @if($family_residence->semitransportation_car == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->semitransportation_car == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                 جرار زراعي
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Tractor == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Tractor == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                سيارة خاصة
                           </td>
                           <td  class="text-center">
                               @if($family_residence->private_car == '١')
                               <i class="fas fa-check"></i>
                               @endif ١
                           </td>
                           <td class="text-center">
                               @if($family_residence->private_car == '٢')
                               <i class="fas fa-check"></i>
                               @endif ٢
                           </td>

                        </tr>
                        <tr>
                            <td> طيور داجنة (دواجن/اوز/ارانب)</td>
                            <td  class="text-center">
                                @if($family_residence->domestic_birds == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->domestic_birds == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>
                            <td class="p-0">
                                <table class="table p-0 m-0">
                                    <tr class="p-0 m-0  ">
                                        <td class="border-l-none border-r-none border-t-none">
                                            غسالة مبلاس عاديه
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                            غسالة مبلاس أوتوماتيكية
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none   border-r-none border-t-none">
                                            تليفون محمول سمارت
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td  class="text-center p-0">

                                <table class="table  p-0 m-0">
                                    <tr class="p-0 m-0">
                                        <td class="border-l-none border-r-none border-t-none">
                                            @if($family_residence->Ordinary_washing_machine == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr  >
                                        <td class="border-l-none border-r-none border-t-none">
                                            @if($family_residence->Automatic_washing_machine == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none   border-r-none border-t-none">
                                            @if($family_residence->Smart_mobile_phone == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td  class="text-center p-0">

                                <table class="table  p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none">
                                            @if($family_residence->Ordinary_washing_machine == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                            @if($family_residence->Automatic_washing_machine == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                            @if($family_residence->Smart_mobile_phone == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td  class="text-center p-0">

                                 <table class="table p-0 m-0">
                                 <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">

                                        </td>
                                    </tr>
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none">
                                           رؤوس ماشية
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                            عددها
                                        </td>
                                    </tr>

                                </table>
                            </td>
                            <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->cattle_heads == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                         <span class="underline underline--dotted " style="padding-left: 10%;padding-right:10%;">
                                                {{$family_residence->number_acres1}}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                             <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->cattle_heads == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>

                                    </tr>
                                <tr >
                                  <td class="border-l-none  border-r-none border-t-none">
                                         <span class="underline underline--dotted " style="padding-left: 10%;padding-right:10%;">
                                                {{$family_residence->number_acres1}}
                                            </span>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                             <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none">
                                         اغنام/ماعز
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                           تليفزيون ملون
                                        </td>

                                    </tr>
                                <tr >
                                  <td class="border-l-none border-r-none border-t-none">
                                        دش/وصلة دش
                                        </td>
                                    </tr>

                                </table>
                            </td>
                           <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">
                                           @if($family_residence->sheepgoats == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->color_TV == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                           @if($family_residence->shower_fitting == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                </table>
                            </td>
                              <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">
                                           @if($family_residence->sheepgoats == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->color_TV == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                           @if($family_residence->shower_fitting == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                </table>
                            </td>

                    <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none">
                                        تليفون ارضي
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                         كمبيوتر
                                        </td>

                                    </tr>
                                <tr >
                                  <td class="border-l-none  border-r-none border-t-none">
                                        سخان مياة
                                        </td>
                                    </tr>

                                </table>
                            </td>

                             <td  class="text-center  p-0">
                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">
                                           @if($family_residence->land_line == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->computer == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                           @if($family_residence->water_heater == '١')
                                            <i class="fas fa-check"></i>
                                            @endif ١
                                        </td>
                                    </tr>
                                </table>
                            </td>
                              <td  class="text-center  p-0">

                                 <table class="table p-0 m-0">
                                    <tr class="p-0 m-0 ">
                                        <td class="border-l-none border-r-none border-t-none" style="height: 49px;">
                                           @if($family_residence->land_line == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none border-r-none border-t-none">
                                             @if($family_residence->computer == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-l-none  border-r-none border-t-none">
                                           @if($family_residence->water_heater == '٢')
                                            <i class="fas fa-check"></i>
                                            @endif ٢
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                          <tr >
                            <td >
                                البند
                            </td>

                            <td  class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>
                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>

                            <td class="text-center">
                                البند
                            </td>

                            <td class="text-center">
                                نعم
                            </td>
                            <td class="text-center">
                                لا
                            </td>
                        </tr>

                          <tr>
                            <td> سرير</td>
                            <td  class="text-center">
                                @if($family_residence->bed == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->bed == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>
                            <td  class="text-center">
                               مرتبة
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Rank == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Rank == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               بطاطين
                            </td>
                            <td  class="text-center">
                                @if($family_residence->Blankets == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Blankets == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                 دولاب
                            </td>
                            <td  class="text-center">
                                @if($family_residence->cupbord == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->cupbord == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               مطبخ
                           </td>
                           <td  class="text-center">
                               @if($family_residence->kitchen == '١')
                               <i class="fas fa-check"></i>
                               @endif ١
                           </td>
                           <td class="text-center">
                               @if($family_residence->kitchen == '٢')
                               <i class="fas fa-check"></i>
                               @endif ٢
                           </td>

                        </tr>

                         <tr>
                            <td> كنب</td>
                            <td  class="text-center">
                                @if($family_residence->sofa == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->sofa == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>
                            <td  class="text-center">
                               ماكينة خياطة
                            </td>
                            <td  class="text-center">
                                @if($family_residence->sewing_machine == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->sewing_machine == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               مروحة
                            </td>
                            <td  class="text-center">
                                @if($family_residence->fan == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->fan == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                                 سيارة أجرة
                            </td>
                            <td  class="text-center">
                                @if($family_residence->cupbord == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->cupbord == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               استطوانة بوتوجاز
                           </td>
                           <td  class="text-center">
                               @if($family_residence->Cooker_cylinder == '١')
                               <i class="fas fa-check"></i>
                               @endif ١
                           </td>
                           <td class="text-center">
                               @if($family_residence->Cooker_cylinder == '٢')
                               <i class="fas fa-check"></i>
                               @endif ٢
                           </td>

                        </tr>

                         <tr>
                            <td class="border-none"> ايجار ارض زراعية من الغير</td>
                            <td  class="text-center border-none">

                            </td>
                            <td class="text-center border-none">

                            </td>
                            <td  class="text-center border-none">

                            </td>
                            <td  class="text-center">
                                @if($family_residence->Rent_agricultural_land_others == '١')
                                <i class="fas fa-check"></i>
                                @endif ١
                            </td>
                            <td class="text-center">
                                @if($family_residence->Rent_agricultural_land_others == '٢')
                                <i class="fas fa-check"></i>
                                @endif ٢
                            </td>

                            <td  class="text-center">
                               عدد الأفدمة
                            </td>

                                <td class="text-center border-r-none  border-l-none border-t-none">
                                         <span class="underline underline--dotted " style="padding-left: 10%;padding-right:10%;">
                                                {{$family_residence->number_acres2}}
                                    </span>
                            </td>
                            <td class="text-center  border-b-none border-r-none" ></td>
                            <td class="text-center  border-none " ></td>
                            <td class="text-center  border-none" ></td>
                            <td class="text-center  border-none " ></td>
                            <td class="text-center  border-none " ></td>
                            <td class="text-center  border-none " ></td>
                            <td class="text-center  border-none " ></td>


                        </tr>
                    </table>
                    </div>

        <div class="text-center text-bold"> موارد الدعم الحالية للأسرة (كل أفراد الأسره: الزوج والزوجةوالابناء وفيرهم إن وجد)</div>
        <div class="row">
           <div class="col-md-6">
           <div class="table-responsive">
                   <table class="table table-bordered-bold mt-4">
                   <tr>
                        <td>
                                الاسئلة ومحدداتها
                        </td>
                        <td>
                               الاكواد الخاصة بالإجابة
                        </td>
                   </tr>
                    <tr>
                     <td class="p-0">
                        <table class="no-margin-button p-0"> <tr><th class="p-1 border-r-none border-t-none"> ٢٢١</th></tr> </table>
                        <p class="ml-4">  هل رب الأسرة يعمل بالخارج؟</p>
                     </td>
                      <td>
                         <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->individual_beneficiary =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:18%;padding-right:18%; "> @if($family_residence->individual_beneficiary =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                     </td>
                    </tr>

                     <tr>
                     <td class="p-0">
                        <table class="no-margin-button p-0"> <tr><th class="p-1 border-r-none border-t-none"> ٢٢٢</th></tr> </table>
                        <p class="ml-4">  هل الأسرة/فرد مستفيد من برنامج الدعم النفدي؟</p>
                     </td>
                      <td >
                         <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($family_residence->water_source =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($family_residence->water_source =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                     </td>
                    </tr>
                    </table>
                    </div>
                    </div>

                     <div class="col-md-6">
                     <div class="table-responsive">
                   <table class="table table-bordered-bold mt-4">
                   <tr>
                        <td>
                                الاسئلة ومحدداتها
                        </td>
                        <td>
                               الاكواد الخاصة بالإجابة
                        </td>
                   </tr>


                    <tr>
                     <td class="p-0" style="height: 161px;">
                        <table class="no-margin-button p-0"> <tr><th class="p-1 border-r-none border-t-none"> ٢٢٣</th></tr> </table>
                        <p class="ml-4">  إسم برنامج/برامج الدعم النقدي</p>
                     </td>
                      <td >
                         <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               تكافل<span class="underline underline--dotted " style="padding-left: 23%;padding-right:23%;"> @if($family_residence->cash_support_program == 'A') <i class="fas fa-check"></i> @endif</span> A
                            </li>
                            <li>
                                كرامة<span class="underline underline--dotted " style="padding-left:25%;padding-right:25%; "> @if($family_residence->cash_support_program == 'B') <i class="fas fa-check"></i> @endif</span> B
                            </li>
                               <li>
                                الضمان الاجتماعي<span class="underline underline--dotted " style="padding-left:11%;padding-right:11%; "> @if($family_residence->cash_support_program == 'C') <i class="fas fa-check"></i> @endif</span> C
                            </li>
                               <li>
                                دعم شهري من الجمعيات<span class="underline underline--dotted " style="padding-left:4%;padding-right:4%; "> @if($family_residence->cash_support_program == 'D') <i class="fas fa-check"></i> @endif</span> D
                            </li>
                            </ul>
                     </td>
                    </tr>
                    </table>
                    </div>
                    </div>
                </div>
                 @endforeach


                    <div class="text-center text-bold">  ثالثاً: الصحةالإنجابية</div>
                    <div class="table-responsive">
         <table class="table table-bordered-bold mt-4">

                    <tr>
                        <td class="text-center">
                            م
                        </td>
                         <td class="text-center">
                         المؤشر
                        </td>
                         <td class="text-center">
                            السيدة ١
                        </td>
                         <td class="text-center">
                            السيدة ٢
                        </td>
                         <td class="text-center">
                            السيدة ٣
                        </td>
                         <td class="text-center">
                          ملاحظات
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            ٣٠٠
                        </td>
                         <td>
                         <p> رقم السطر في جدول الأسرة  </p>
                         <p>  الاسم </p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">

                            <table class="no-margin-button ml-2 mb-2 d-flex justify-content-center" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->number_family_table}}</td> </tr></table>
                                <span class=" underline underline--dotted" style="padding-left: 10%;padding-right:10%;">    {{$reproductiveHealth->name_in_table }} </span>
                            </td>

                        @endforeach
                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->name_in_table_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>


                    <tr>
                        <td class="text-center">
                            ٣٠١
                        </td>
                         <td>
                         <p> ياتري سبق انك استخدمتي وسيلة لتنظيم الأسرة؟  </p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->family_planning_method =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->family_planning_method =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                            </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->family_planning_method_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>


                        <tr>
                            <td class="text-center">
                                ٣٠٢
                            </td>
                            <td>
                            <p class="mb-0">اول مرة استخدمتي وسيلة كان  </p>
                            <p class="mt-0">  عندك كام عيل عايش وقتها؟ </p>
                            </td>
                            @foreach($searchCase->reproductiveHealth as $reproductiveHealth)

                            <td class="text-center">
                                 {{-- <table class="no-margin-button ml-2 mb-2 d-flex justify-content-center mt-4"  ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->first_time_used}}</td> </tr></table> --}}
                                    <div  class="row col-md-12 mt-4">  <div style="margin-right: 29% !important;"></div> <table class="table table-bordered-bold no-margin-button ml-2 col-md-5" > <tr>   <td style="width:70%;" class="pt-2 pb-2"> {{$reproductiveHealth->first_time_used}} </td>  </tr> </td> </table>  </div>

                            </td>

                            @endforeach


                            @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                            <td class="text-center">
                                    <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->first_time_used_Notes}}</span>
                                </td>
                                @endforeach
                        </tr>


                    <tr>
                        <td class="text-center">
                            ٣٠٣
                        </td>
                         <td>
                         <p class="mb-0"> أيه الوسيلة اللي انتي استخدمتيها اول مرة؟ </p>
                        </td>
                    @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                        <li>
                            الحبوب<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->sed_first_time =='١') <i class="fas fa-check"></i> @endif</span> ١
                        </li>
                        <li>
                            اللولب<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->sed_first_time =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                        </li>
                        <li>
                            الحقن<span class="underline underline--dotted " style="padding-left:20%;padding-right:20%; "> @if($reproductiveHealth->sed_first_time =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                        </li>
                        <li>
                            كبسولات تحت الجلد<span class="underline underline--dotted " style="padding-left:3%;padding-right:3%; "> @if($reproductiveHealth->sed_first_time =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                        </li>
                        <li>
                            إطالة فترة الرضاعة<span class="underline underline--dotted " style="padding-left:4%;padding-right:4%; "> @if($reproductiveHealth->sed_first_time =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                        </li>
                        <li>
                            أخري<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->sed_first_time =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                        </li>
                        </ul>
                        </td>

                     @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->sed_first_time_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                        <tr>
                            <td class="text-center">
                                    ٣٠٤
                                </td>
                                <td>
                                    <p class="mb-0"> هل انتي حامل حالياً؟ </p>

                                </td>
                            @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%;"> @if($reproductiveHealth->currently_pregnant =='١') <i class="fas fa-check"></i> @endif</span> ١
                                    </li>
                                    <li>
                                     لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->currently_pregnant =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                    </li>
                                    </ul>
                            </td>

                            @endforeach


                                @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                                <td class="text-center">
                                        <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->currently_pregnant_Notes}}</span>
                                    </td>
                                    @endforeach
                        </tr>


                        <tr>
                            <td class="text-center">
                                    ٣٠٥
                                </td>
                                <td>
                                    <p class="mb-0">ياتري دلوقتي بتستخدمي  </p>
                                   <p class="mt-0">وسيله لتنظيم الأسرة؟ </p>
                                </td>
                            @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%;"> @if($reproductiveHealth->method_family_planning =='١') <i class="fas fa-check"></i> @endif</span> ١
                                    </li>
                                    <li>
                                     لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->method_family_planning =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                    </li>
                                    </ul>
                            </td>

                            @endforeach


                                @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                                <td class="text-center">
                                        <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->method_family_planning_Notes}}</span>
                                    </td>
                                    @endforeach
                        </tr>

                        <tr>
                        <td class="text-center">
                            ٣٠٦
                        </td>
                         <td>
                         <p class="mb-0"> أيه الوسيلة اللي  </p>
                         <p> بتستخدميها دلوقتي؟ </p>
                        </td>
                    @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                        <li>
                            الحبوب<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->method_you_use =='١') <i class="fas fa-check"></i> @endif</span> ١
                        </li>
                        <li>
                            اللولب<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->method_you_use =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                        </li>
                        <li>
                            الحقن<span class="underline underline--dotted " style="padding-left:20%;padding-right:20%; "> @if($reproductiveHealth->method_you_use =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                        </li>
                        <li>
                            كبسولات تحت الجلد<span class="underline underline--dotted " style="padding-left:3%;padding-right:3%; "> @if($reproductiveHealth->method_you_use =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                        </li>
                        <li>
                            إطالة فترة الرضاعة<span class="underline underline--dotted " style="padding-left:4%;padding-right:4%; "> @if($reproductiveHealth->method_you_use =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                        </li>
                        <li>
                            أخري<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->method_you_use =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                        </li>
                        </ul>
                        </td>

                     @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->method_you_use_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>


                     <tr>
                        <td class="text-center">
                            ٣٠٧
                        </td>
                         <td>
                         <p class="mb-0"> ياتري أخر  وسيلة استخدمتيها   </p>
                         <p class="mt-0"> كانت منين؟ </p>
                        </td>
                    @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                                الوحدة الصحية<span class="underline underline--dotted " style="padding-left: 13%;padding-right:13%;"> @if($reproductiveHealth->last_method_used =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                وحدة خارج القرية<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($reproductiveHealth->last_method_used =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            <li>
                                عيادة خاصة<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($reproductiveHealth->last_method_used =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                            </li>
                            <li>
                                الصيدلية<span class="underline underline--dotted " style="padding-left: 21%;padding-right: 21%;"> @if($reproductiveHealth->last_method_used =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                            </li>
                            <li>
                                عيادة الجمعية<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($reproductiveHealth->last_method_used =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                            </li>
                            <li>
                                عيادة متنقلة<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                            </li>
                            <li>
                                أخري<span class="underline underline--dotted " style="padding-left: 25%;padding-right: 25%;"> @if($reproductiveHealth->last_method_used =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                            </li>
                            </ul>
                        </td>

                     @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->last_method_used_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                    <tr>
                        <td class="text-center">
                            ٣٠٨
                        </td>
                         <td>
                         <p> هل ترغبين في إنجاب أطفال؟ </p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->want_have_children =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->want_have_children =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                            </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->want_have_children_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                         <tr>
                        <td class="text-center">
                            ٣٠٩
                        </td>
                         <td>
                         <p class="mb-0">طالما انتي  مش عايزة تخلفي </p>
                          <p class="mt-0 mb-0">طفل تاني ليه مش بتستخدمي </p>
                           <p  class="mt-0">وسيلة  لتنظيم الأسرة؟</p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                             <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$reproductiveHealth->have_another_child}}</span>
                            </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->have_another_child_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                    <tr>
                        <td class="text-center">
                            ٣٠٨
                        </td>
                         <td>
                         <p class="mb-0"> ياتري ناويه تستخدمي وسيلة </p>
                          <p class="mt-0"> لتنظيم الأسرة في المستقبل؟</p>

                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->want_family_planning =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->want_family_planning =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                            </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->want_family_planning_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                         <tr>
                        <td class="text-center">
                            ٣٠٨
                        </td>
                         <td>
                         <p class="mb-0"> ليه مش ناويه تستخدمي </p>
                          <p class="mt-0"> أي وسيلة في المستقبل ؟</p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                           <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نرغب في الإنجاب<span class="underline underline--dotted " style="padding-left: 13%;padding-right:13%;"> @if($reproductiveHealth->last_method_used =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                عدم القدرة في الانجاب<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($reproductiveHealth->last_method_used =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            <li>
                               سن اليأس/استئصال الرحم<span class="underline underline--dotted " style="padding-left:8%;padding-right:9%; "> @if($reproductiveHealth->last_method_used =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                            </li>
                            <li>
                                معارضة الزوج<span class="underline underline--dotted " style="padding-left: 21%;padding-right: 21%;"> @if($reproductiveHealth->last_method_used =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                            </li>
                            <li>
                                محرمة دينياً<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($reproductiveHealth->last_method_used =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                            </li>
                            <li>
                                اعتبارات صحية<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                            </li>
                            <li>
                               الاعراض الجانبية<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='٧') <i class="fas fa-check"></i> @endif</span> ٧
                            </li>
                            <li>
                               عدم توافر الوسيلة<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='٨') <i class="fas fa-check"></i> @endif</span> ٨
                            </li>
                            <li>
                                صعوبة الحصول عليها<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                            </li>
                            <li>
                               التكلفة المرتفعة<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($reproductiveHealth->last_method_used =='١٠') <i class="fas fa-check"></i> @endif</span> ١٠
                            </li>
                            <li>
                                أخري<span class="underline underline--dotted " style="padding-left: 25%;padding-right: 25%;"> @if($reproductiveHealth->last_method_used =='٩٩') <i class="fas fa-check"></i> @endif</span> ٩٩
                            </li>
                            </ul>
                        </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->want_family_planning_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>


               </table>
                </div>


                <div class="table-responsive">
                <table class="table table-bordered-bold mt-4">

                    <tr>
                        <td class="text-center">
                            م
                        </td>
                         <td class="text-center">
                         المؤشر
                        </td>
                         <td class="text-center">
                            السيدة ١
                        </td>
                         <td class="text-center">
                            السيدة ٢
                        </td>
                         <td class="text-center">
                            السيدة ٣
                        </td>
                         <td class="text-center">
                          ملاحظات
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            ٣٠٠
                        </td>
                         <td>
                         <p>الاسم </p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                                <span class=" underline underline--dotted" style="padding-left: 10%;padding-right:10%;">    {{$reproductiveHealth->name_in_table }} </span>
                            </td>

                        @endforeach

                          <td class="text-center"></td>
                        </tr>


                    <tr>
                        <td class="text-center">
                            ٣٠١
                        </td>
                         <td>
                         <p class="mb-0"> هل لا قدر الله انجيتي  </p>
                         <p class="mt-0">  طفل وتوفي؟ </p>
                        </td>
                         @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> @if($reproductiveHealth->gave_birth_child_died =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:19%;padding-right:19%; "> @if($reproductiveHealth->gave_birth_child_died =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                            </td>

                        @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->gave_birth_child_died_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>


                        <tr>
                            <td class="text-center">
                                ٣٠٢
                            </td>
                            <td>
                            <p class="mb-0">كم عدد جميع  الاطفال اللي</p>
                            <p class="mb-0 mt-0"> انجبتهم الخميس سنين </p>
                             <p class="mt-0"> الي فاتو؟ </p>
                            </td>
                            @foreach($searchCase->reproductiveHealth as $reproductiveHealth)

                            <td class="text-center">
                               <div class="row col-md-12 text-center">  <div class="col-md-3 text-end">حي</div>    <span class="underline underline--dotted col-md-2"></span> <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->gave_birth_child_live}}</td> </tr></table> </div>
                               <div class="row col-md-12 text-center">  <div class="col-md-4 text-end">ميت</div>    <span class="underline underline--dotted col-md-2"></span> <table class="no-margin-button ml-2  mt-2 col-md-3" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->gave_birth_child_died_num}}</td> </tr></table> </div>
                            </td>

                            @endforeach


                            @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                            <td class="text-center">
                                    <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->gave_birth_child_live_Notes}}</span>
                                </td>
                                @endforeach
                        </tr>


                    <tr>
                        <td class="text-center">
                            ٣١٤
                        </td>
                         <td>
                         <p  class="mb-0"> كم عدد جميع الاطفال اللي انجبتيهم </p>
                         <p class="mt-0">الخمس سنين الي فاتوا ؟ </p>
                        </td>
                    @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                        <td class="text-center">
                               <div class="row col-md-12 text-center">  <div class="col-md-4 text-end">حي</div>    <span class="underline underline--dotted col-md-2"></span> <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->children_past_five_years_live}}</td> </tr></table> </div>
                               <div class="row col-md-12 text-center">  <div class="col-md-4 text-end">ميت</div>    <span class="underline underline--dotted col-md-2"></span> <table class="no-margin-button ml-2 mt-2  col-md-3" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->children_past_five_years_dead}}</td> </tr></table> </div>
                            </td>

                     @endforeach


                          @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                          <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->children_past_five_years_live_Notes}}</span>
                            </td>
                            @endforeach
                        </tr>



                        <tr>
                            <td class="text-center">
                                    ٣١٥
                                </td>
                                <td>
                                    <p class="mb-0"> تفتكري عادة ختان البنات (الطهارة) </p>
                                   <p class="mt-0">لازم نستمر ولا لازم نتوقف؟ </p>
                                </td>
                            @foreach($searchCase->reproductiveHealth as $reproductiveHealth)
                            <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                نستمر<span class="underline underline--dotted " style="padding-left: 13%;padding-right:13%;"> @if($reproductiveHealth->purification =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                نتوقف<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($reproductiveHealth->purification =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                                لاأعرف<span class="underline underline--dotted " style="padding-left:8%;padding-right:9%; "> @if($reproductiveHealth->purification =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                            </ul>
                            </td>
                            @endforeach


                                @foreach($searchCase->reproductiveHealth_note as $reproductiveHealth_note)
                                <td class="text-center">
                                        <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$reproductiveHealth_note->purification_Notes}}</span>
                                    </td>
                                    @endforeach
                        </tr>




               </table>
                </div>


            <div class="text-center text-bold margin-print-6"> رابعاً: مشروعات الأسرة</div>

            <div class="table-responsive">
            <table class="table table-bordered-bold mt-4">
                    <tr>
                     <td class="text-center">
                            م
                    </td>
                      <td style="width: 30%;" class="text-center">
                        المؤشر
                    </td>
                      <td class="text-center">
                            التقييم
                    </td>
                      <td class="text-center">
                            الملاحظات
                    </td>
                    </tr>
                 @foreach($searchCase->family_project as $family_project)
                    <tr>
                     <td class="text-center">
                            ٤٠١
                    </td>
                      <td>
                        <p class="mb-0">	في حد أو اكثر من أفراد الأسرة</p>
                        <p class="mb-0 mt-0">بيمتلك أو بيشارك في مشروع مثل</p>
                        <p class="mb-0 mt-0">دكان بقالة / مشروع حرق أو تجاري أو خدمي؟</p>

                    </td>

                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left:23%;padding-right:23%;"> @if($family_project->more_family_members_own_participate =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                             @if($family_project->more_family_members_own_participate =='١')
                              <table class="no-margin-button ml-2 d-flex justify-content-center mt-2" ><tr> <td class="pt-2 pb-2"> {{$family_project->more_family_members_own_participate_number}}</td> </tr></table>
                            @endif
                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; "> @if($family_project->more_family_members_own_participate =='٢') <i class="fas fa-check"></i> @endif</span> ٢ <i class="fas fa-arrow-left mr-2"></i> ٤٠٥
                            </li>
                            </ul>

                        </td>
                      <td class="text-center">
                          <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->more_family_members_own_participate_Notes}}</span>
                    </td>
                    </tr>

                     <tr>
                     <td class="text-center">
                            ٤٠٢
                    </td>
                      <td>
                        <p >	وايه هوه نشاط المشروع؟</p>


                    </td>

                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               مشروع تاجري<span class="underline underline--dotted " style="padding-left:17%;padding-right:16%;"> @if($family_project->What_project_activity =='A') <i class="fas fa-check"></i> @endif</span> A
                            </li>
                            <li>
                                مشروع حيواني<span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; "> @if($family_project->What_project_activity =='B') <i class="fas fa-check"></i> @endif</span> B
                            </li>
                             <li>
                               مشروع حرفي<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%;"> @if($family_project->What_project_activity =='C') <i class="fas fa-check"></i> @endif</span> C
                            </li>
                            <li>
                                أخري<span class="underline underline--dotted " style="padding-left:25%;padding-right:25%; "> @if($family_project->What_project_activity =='X') <i class="fas fa-check"></i> @endif</span> X
                            </li>
                            </ul>

                        </td>
                      <td class="text-center">
                          <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->What_project_activity_Notes}}</span>
                    </td>
                    </tr>


                    <tr>
                     <td class="text-center">
                            ٤٠٣
                    </td>
                      <td>
                        <p>	ما نوع المشروع ؟ (يذكر كتابة)</p>
                    </td>

                        <td class="text-center">
                            <span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; ">{{$family_project->type_of_project}} </span>

                        </td>
                      <td class="text-center">
                          <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->type_of_project_Notes}}</span>
                    </td>
                    </tr>

                     <tr>
                        <td class="text-center">
                                ٤٠٤
                        </td>
                        <td >
                            <p>	وتقريباً الدخل الشهري المتولد من المشروع ؟ (تذكر كتابة)</p>
                        </td>
                        <td class="text-center">
                            <div class="row col-md-12 text-center">  <span class="mt-2 ml-4"> قيمة الدخل بالجنية  </span><table class="no-margin-button ml-2  col-md-4" ><tr> <td class="pt-2 pb-2"> {{$reproductiveHealth->monthly_income_generated}}</td> </tr></table> </div>
                        </td>
                        <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->monthly_income_generated_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td class="text-center">
                                ٤٠٥
                        </td>
                        <td>
                            <p>	في حالة توفر فرصة هل ترغب في الحصول علي قرض؟</p>
                        </td>
                        <td class="text-center">
                                <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        نعم<span class="underline underline--dotted " style="padding-left:14%;padding-right:14%;"> @if($family_project->would_like_assignment =='١') <i class="fas fa-check"></i> @endif</span> ١
                                        </li>
                                        <li>
                                            لا<span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; "> @if($family_project->would_like_assignment =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                        </li>
                                </ul>
                        </td>
                        <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->would_like_assignment_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                     <td class="text-center">
                            ٤٠٦
                    </td>
                      <td>
                        <p >	هتاخد القرض دا ليه؟</p>


                    </td>

                        <td class="text-center">
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               مشروع<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($family_project->Why_will_take_loan =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>
                            <li>
                               تسديد ديون<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;"> @if($family_project->Why_will_take_loan =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                             <li>
                              زواج أبناء<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($family_project->Why_will_take_loan =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                            </li>
                            <li>
                             إجراء عملية<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($family_project->Why_will_take_loan =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                            </li>
                            <li>
                             بناء دور بالمنزل<span class="underline underline--dotted " style="padding-left: 4%;padding-right: 4%;"> @if($family_project->Why_will_take_loan =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                            </li>
                            <li>
                              تحديد/صيانة المنزل<span class="underline underline--dotted " style="padding-left: 2%;padding-right: 2%;"> @if($family_project->Why_will_take_loan =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                            </li>
                            <li>
                                أخري<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 12%;"> @if($family_project->Why_will_take_loan =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                            </li>
                            </ul>

                        </td>
                      <td class="text-center">
                          <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->Why_will_take_loan_Notes}}</span>
                    </td>
                    </tr>
            </table>
            </div>

                <div class="text-center text-bold"> خامساً: مصادر الدخل </div>

                <div class="table-responsive">
            <table class="table table-bordered-bold mt-4">
                    <tr>
                     <td class="text-center" style="width:4%;">
                            ٥٠١
                    </td>
                      <td style="width: 30%;">
                        <p class="mb-0 text-bold">إيه مصادر دخل الأسرة من ما يأتي:</p>
                        <p class="mt-0 text-bold">عند الإجابة بنعم اذكر القيمة</p>

                    </td>
                      <td class="text-center">
                               <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0"> نعم</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-0 pb-0">قمية الدخل</td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">لا</td> </tr></table></div>
                      </td>

                      <td class="text-center">
                            الملاحظات
                    </td>
                    </tr>
                    <tr>
                     <td class="border-none"></td>
                     <td>
                            <p class="mt-4">  الأجور والمرتبات (ثابتة او غير ثابته) </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->fixed_or_unfixed =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->fixed_or_unfixed_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->fixed_or_unfixed =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$family_project->Reproductive_Health_Notes}}</span>
                             </td>
                    </tr>
                       <tr >
                     <td class="border-none"></td>
                            <td>
                            <p class="mt-2">  دخل من اعمال زراعية </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Income_agricultural_work =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Income_agricultural_work_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Income_agricultural_work =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                             <td></td>

                    </tr>
                       <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2">  دخل من مشروعات حيوانية </p>
                            <p class="mt-4">  دخل من مشروع لدي الأسرة </p>
                            </td>
                            <td class="text-center">
                           <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Income_animal_business =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Income_animal_business_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Income_animal_business =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Income_family_business =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Income_family_business_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Income_family_business =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td></td>
                    </tr>

                    <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2"> معاش حكومي/ضمان </p>
                            <p class="mt-4"> مساعدات من جمعيات اهلية </p>
                            </td>
                            <td class="text-center">
                           <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Government_pension =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Government_pension_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Government_pension =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Aid_from_NGOs =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Aid_from_NGOs_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Aid_from_NGOs =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td></td>
                    </tr>


                    <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2"> مساعدات من أهل الخير </p>
                            <p class="mt-4">اخري </p>
                            </td>
                            <td class="text-center">
                           <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->Help_good_people =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->Help_good_people_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->Help_good_people =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($family_project->other =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>  <i class="fas fa-arrow-left mt-2"></i>  <table class="no-margin-button ml-2   col-md-3" ><tr> <td class="pt-2 pb-2"> {{$family_project->other_number}}  </td> </tr></table>   <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($family_project->other =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td></td>
                    </tr>
                       @endforeach
            </table>
            </div>
                    <div class="text-center text-bold">سادساً: الخلفية الإقراضية</div>

                    <div class="table-responsive">
                    <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td>
                            م
                        </td>
                        <td style="width: 20%;">
                            المؤشر
                        </td>
                        <td>
                            التقييم
                        </td>
                        <td>
                            ملاحظات
                        </td>
                    </tr>
                    @foreach($searchCase->lending_background as $lending_background)
                     <tr>
                        <td>
                            ٦٠١
                        </td>
                        <td>
                          <p>  هل سبق لك الحصول علي قرض؟ </p>
                        </td>
                        <td >
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:14%;padding-right:14%;"> @if($lending_background->Have_ever_loan =='١') <i class="fas fa-check"></i> @endif</span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted " style="padding-left:18%;padding-right:18%; "> @if($lending_background->Have_ever_loan =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                    </li>
                            </ul>
                        </td>
                        <td >
                             <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->Have_ever_loan_Notes}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ٦٠٢
                        </td>
                        <td>
                          <p>قيمة اخر قرض حصلت علية كان قد ايه؟</p>
                        </td>
                        <td >
                        <div class="row">
                            <table class="table table-bordered-bold no-margin-button ml-4 col-md-3" > <tr>
                              @if(strlen($lending_background->value_last_loan)-1 == -1)
                                <td></td>
                             @else
                            @for($i = strlen($lending_background->value_last_loan)-1; $i >= 0 ; $i--)
                                        <th class=" <?php if (substr($lending_background->value_last_loan[$i], -1,1) != null)
                                        echo 'border-sm'?>"> {{$lending_background->value_last_loan[$i]}} </th>
                            @endfor
                            @endif
                                </tr> </table>   <div class="mr-0"> جنية</div>     </div>
                         </td>
                        <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->value_last_loan}}</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            ٦٠٣
                        </td>
                        <td>
                          <p>  وعملتوا أيه بفلوس اخر قرض؟</p>
                        </td>
                        <td >
                              <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                عمل مشروع<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->What_with_another_loan =='A') <i class="fas fa-check"></i> @endif</span> A
                                </li>
                                <li>
                               تسديد ديون<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($lending_background->What_with_another_loan =='B') <i class="fas fa-check"></i> @endif</span> B
                                </li>
                                <li>
                               زواج أحد أفراد الأسرة<span class="underline underline--dotted " style="padding-left: 5%;padding-right: 5%;"> @if($lending_background->What_with_another_loan =='C') <i class="fas fa-check"></i> @endif</span> C
                                </li>
                                <li>
                               علاج/جراحة لأحد أفراد الأسرة<span class="underline underline--dotted " style="padding-left: 2%;padding-right: 2%;"> @if($lending_background->What_with_another_loan =='D') <i class="fas fa-check"></i> @endif</span> D
                                </li>
                                <li>
                                بناء منزل/ شراء شقة<span class="underline underline--dotted " style="padding-left: 4%;padding-right: 4%;"> @if($lending_background->What_with_another_loan =='E') <i class="fas fa-check"></i> @endif</span> E
                                </li>
                                <li>
                                عمل صيانة/ترميم بالمنزل<span class="underline underline--dotted " style="padding-left: 2%;padding-right: 2%;"> @if($lending_background->What_with_another_loan =='F') <i class="fas fa-check"></i> @endif</span> F
                                </li>
                                <li>
                                أخري تذكر<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 12%;"> @if($lending_background->What_with_another_loan =='X') <i class="fas fa-check"></i> @endif</span> X
                                </li>
                            </ul>

                            @if($lending_background->What_with_another_loan_Anther)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->What_with_another_loan_Anther}}</p>
                            @endif
                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->What_with_another_loans_Notes}}</span>
                        </td>
                    </tr>


                       <tr>
                        <td>
                            ٦٠٤
                        </td>
                        <td>
                          <p>  ممكن تقوللي طبيعة القرض الي حضرتك حصلت علية؟</p>
                        </td>
                        <td >
                              <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                               قرض بدون أيه ضمانات<span class="underline underline--dotted " style="padding-left: 3%;padding-right: 3%;"> @if($lending_background->tell_nature_loan =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                               قرض بضمانات شخصية<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;"> @if($lending_background->tell_nature_loan =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                               قرض برهن عقاري<span class="underline underline--dotted " style="padding-left: 4%;: 2%;padding-right: 4%;"> @if($lending_background->tell_nature_loan =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                                <li>
                                أخري تذكر<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 12%;"> @if($lending_background->tell_nature_loan =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                                </li>
                            </ul>
                            @if($lending_background->tell_nature_loan_Anther)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->tell_nature_loan_Anther}}</p>
                            @endif
                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->tell_nature_loan_Notes}}</span>
                        </td>
                    </tr>



                      <tr style=" page-break-inside:avoid;">
                        <td>
                            ٦٠٥
                        </td>
                        <td>
                          <p class="mb-0"> ممكن تقولي أيه هي الأوراق اللي كانت</p>
                           <p class="mt-0"> مطلوبة منك للحصول علي قرض؟</p>
                        </td>
                        <td >
                              <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                              صورة بطاقة الرقم القومي<span class="underline underline--dotted " style="padding-left: 3%;padding-right: 3%;">

                               @for($i = 0; $i < strlen($lending_background->papers_required_loan); $i++)
                                         @if(mb_substr($lending_background->papers_required_loan,$i,1,'utf-8') =='١') <i class="fas fa-check"></i> @endif
                                @endfor
                               </span> ١
                                </li>
                                <li>
                                 ايصال مرافق حديث (مياة - كهرباء)<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;">
                                  @for($i = 0; $i < strlen($lending_background->papers_required_loan); $i++)
                                         @if(mb_substr($lending_background->papers_required_loan,$i,1,'utf-8') =='٢') <i class="fas fa-check"></i> @endif
                                @endfor
                                </span> ٢
                                </li>
                                <li>
                                 صورة مستخرج حديث للسجل التجاري والبطاقة الضريبية<span class="underline underline--dotted " style="padding-left: 4%;: 2%;padding-right: 4%;">
                               @for($i = 0; $i < strlen($lending_background->papers_required_loan); $i++)
                                         @if(mb_substr($lending_background->papers_required_loan,$i,1,'utf-8') =='٣') <i class="fas fa-check"></i> @endif
                                @endfor
                                </span> ٣
                                </li>
                                 <li>
                                 مفردات مرتب<span class="underline underline--dotted " style="padding-left: 4%;: 2%;padding-right: 4%;">
                                @for($i = 0; $i < strlen($lending_background->papers_required_loan); $i++)
                                         @if(mb_substr($lending_background->papers_required_loan,$i,1,'utf-8') =='٤') <i class="fas fa-check"></i> @endif
                                @endfor
                                </span> ٤
                                </li>
                                <li>
                                أخري تذكر<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 12%;">
                                   @for($i = 0; $i < strlen($lending_background->papers_required_loan); $i++)
                                         @if(mb_substr($lending_background->papers_required_loan,$i,1,'utf-8') =='٩') <i class="fas fa-check"></i> @endif
                                @endfor
                                </span> ٩
                                </li>
                            </ul>

                            @if($lending_background->papers_required_loans_Anther)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->papers_required_loans_Anther}}</p>
                            @endif
                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->papers_required_loans_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                        <td>
                            ٦٠٦
                        </td>
                        <td>
                        <p class="mb-0"> ممكن تقولي أيه هي المدة اللي بياخدوها</p>
                        <p class="mt-0 mb-0"> للرد علي طلب لحصول علي القرض</p>
                        <p class="mt-0"> بعد استلام كافة المستندات اللازمة؟</p>

                        </td>
                        <td >
                               <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                               أقل من أسبوع<span class="underline underline--dotted " style="padding-left: 5%;padding-right: 5%;"> @if($lending_background->how_long_takes_respond =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                              من أسبوع إلي شهر<span class="underline underline--dotted " style="padding-left: 3%;padding-right: 3%;"> @if($lending_background->how_long_takes_respond =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                               أكثر من شهر<span class="underline underline--dotted " style="padding-left:6%;: 2%;padding-right: 6%;"> @if($lending_background->how_long_takes_respond =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                                <li>
                                أخري تذكر<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($lending_background->how_long_takes_respond =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                                </li>
                            </ul>

                            @if($lending_background->how_long_takes_respond_Anther)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->how_long_takes_respond_Anther}}</p>
                            @endif
                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->how_long_takes_respond_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            ٦٠٧
                        </td>
                        <td>
                          <p>  ممكن تقوللي هل كان العقد واضح ومفسر بالنسبالك؟ </p>
                        </td>
                        <td >
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                      نعم<span class="underline underline--dotted " style="padding-left:8%;padding-right:8%;"> @if($lending_background->tell_contract_clear =='١') <i class="fas fa-check"></i> @endif</span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted " style="padding-left:9%;padding-right:9%; "> @if($lending_background->tell_contract_clear =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                    </li>
                            </ul>
                        </td>
                        <td class="text-center">
                             <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->tell_contract_clear_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                        <td>
                            ٦٠٨
                        </td>
                        <td>
                          <p> ممكن تقولي هل حصلت علي نسخة من العقد؟ </p>
                        </td>

                        <td >
                            <ul style="list-style: none;margin: 0;padding: 0;">
                            <li>
                               نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->copy_contract =='١') <i class="fas fa-check"></i> @endif</span> ١
                            </li>

                            <li>
                                لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->copy_contract =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                            </li>
                            </ul>
                        </td>
                        <td class="text-center">
                             <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->copy_contract_Notes}}</span>
                        </td>
                    </tr>
                    <tr>
                     <td class="text-center" style="width:4%;">
                            ٦٠٩
                    </td>
                      <td style="width: 30%;">
                        <p class="mb-0 text-bold">طب ياتري المؤسسة المالية اللي اقترضت</p>
                        <p class="mt-0 text-bold">منها شرحتلك الحاجات الي هقولك عليها</p>
                    </td>
                      <td class="text-center">
                               <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0"> نعم</td> </tr></table>    <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">لا</td> </tr></table></div>
                      </td>

                      <td class="text-center">
                            الملاحظات
                    </td>
                    </tr>
                    <tr>
                     <td class="border-none"></td>
                     <td>
                            <p class="mt-4"> معدل الفائدة </p>
                            </td>
                            <td >
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->interest_rate =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>     <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->interest_rate =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td class="text-center">
                                <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->last_remember_Notes}}</span>
                             </td>
                    </tr>
                       <tr >
                     <td class="border-none"></td>
                            <td>
                            <p class="mt-2">  الرسوم </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Fee =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Fee =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                        <td>
                        </td>
                    </tr>
                       <tr>
                          <td class="border-none"></td>
                            <td>

                            <p class="mt-2">  شروط الدفع </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Payment_Terms =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Payment_Terms =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                              <td>
                        </td>
                    </tr>

                    <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2"> عواقب / عقوبات التأخر عن الدفع </p>

                            </td>
                            <td class="text-center">
                           <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2   col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Consequences_late_payment =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>     <table class="no-margin-button ml-4  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Consequences_late_payment =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                             </td>
                            <td>
                            </td>
                    </tr>


                    <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2">حالات التعثر وعواقبه</p>
                                <p class="mt-2">اجراءات تعديل أو تغيير شروط العقد وإمكانية الوصول إلي اتفاق للتعديل من قبل المؤسسات المالية متناهية الصغر</p>
                                  <p class="mt-2"> خيارات يمكن اللجواء لها في حالة عدم الرضا عن شروط المؤسسة المالية </p>
                                    <p class="mt-2"> حماية وسرية بينات ومعلومات المقترضين </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Failures_their_consequences =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Failures_their_consequences =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->amending_changing =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->amending_changing == '٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Options_resorted_event =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Options_resorted_event == '٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->data_information_borrowers =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->data_information_borrowers =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>

                             </td>
                              <td>
                             </td>
                    </tr>


                     <tr>
                          <td class="border-none"></td>
                            <td>
                              <p class="mt-2">سرد معلومات ماهي الاجتماعات/الدورات التدريبية اللي حضرتها قبل الحصول علي القرض</p>
                                <p class="mt-2">أخري تذكر</p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->information_rights_borrower =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->information_rights_borrower =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->last_remember =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->last_remember == '٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>

                            @if($lending_background->last_remember_another)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->last_remember_another}}</p>
                            @endif

                             </td>
                              <td>
                             </td>
                    </tr>

                    <tr>
                            <td >٦١٠</td>
                            <td>
                                <p class="mt-2">ممكن تقوللي أيه هي الضمانات اللي حضرتك قدمتها؟</p>
                            </td>

                            @if($lending_background->training_courses_attended  != null || $lending_background->training_courses_attended1 != null || $lending_background->training_courses_attended2 != null ||$lending_background->training_courses_attended3 != null)
                            <td>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended}}</span> ١ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended1}}</span> ٢ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended2}}</span> ٣ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended3}}</span> ٤ </p>
                                <p class="mt-0 mb-0">  لم يحضر أي دورات أو اجتماعات<span class="underline underline--dotted " style="padding-left:4%;padding-right:4%;"></span> ٩</p>
                            </td>
                            @else
                            <td>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended}}</span> ١ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended1}}</span> ٢ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended2}}</span> ٣ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->training_courses_attended3}}</span> ٤ </p>
                                <p class="mt-0 mb-0">  لم يحضر أي دورات أو اجتماعات<span class="underline underline--dotted " style="padding-left:4%;padding-right:4%;"><i class="fas fa-check"></i>  </span>٩</p>
                            </td>
                            @endif

                            <td class="text-center">
                                 <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->what_guarantees_provided_Notes}}</span>
                            </td>
                    </tr>


                    <tr>
                            <td >٦١١</td>
                            <td>
                                <p class="mt-2">ممكن تقولي ما هي الإجتماعات/ الدورات التدريبية اللي حضرتها قبل الحصول علي القرض؟</p>
                            </td>
                            <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                ضامن شخصي<span class="underline underline--dotted padding-width-2" > @if($lending_background->what_guarantees_provided =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                رهن عقاري(أرض - عقار)<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->what_guarantees_provided =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                                رهن علي أصول منقولة<span class="underline underline--dotted " style="padding-left: 9%;padding-right:9%;"> @if($lending_background->what_guarantees_provided =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                                <li>
                                ايصالات امانة علي انا والضامن<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 5%;"> @if($lending_background->what_guarantees_provided =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                </li>
                                <li>
                                ايصالات امنه علي انا الضامن<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($lending_background->what_guarantees_provided =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                </li>
                                <li>
                                    أخري تذكر<span class="underline underline--dotted " style="padding-left: 15%;padding-right: 15%;"> @if($lending_background->what_guarantees_provided =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                                </li>
                            </ul>
                            </td>
                            <td></td>
                    </tr>

                     <tr>
                        <td>
                            ٦١٢
                        </td>
                        <td>
                          <p>  هل قمت حضرتك بالتوقيع علي اوراق أخري كضمانات للقرض؟ </p>
                        </td>
                        <td >
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                      نعم<span class="underline underline--dotted " style="padding-left:8%;padding-right:8%;"> @if($lending_background->papers_collateral_loan =='١') <i class="fas fa-check"></i> @endif</span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted " style="padding-left:9%;padding-right:9%; "> @if($lending_background->papers_collateral_loan =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                    </li>
                            </ul>
                        </td>
                        <td class="text-center">
                             <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->papers_collateral_loan_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                          <td class="border-none">  ٦١٣</td>
                            <td>
                              <p class="mt-2">ما هي الاوراق وما قيمتها؟</p>
                               <p class="mt-2">ايصال امانة : </p>
                                <p class="mt-2">شيك :</p>
                                 <p class="mt-2">أخري تذكر : </p>
                            </td>
                            <td class="text-center">
                            <div class="row col-md-12 text-center mt-4">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->trust_receipt =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->trust_receipt =='٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->Check =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->Check == '٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>
                            <div class="row col-md-12 text-center mt-2">  <table class="no-margin-button ml-2  mt-2  col-md-3" ><tr> <td  class="pt-0 pb-0">  @if($lending_background->other_remember =='١') <i class="fas fa-check"></i> @endif ١</td> </tr></table>    <table class="no-margin-button ml-2  mt-2  col-md-2" ><tr> <td  class="pt-0 pb-0">@if($lending_background->other_remember == '٢') <i class="fas fa-check"></i> @endif ٢</td> </tr></table></div>

                             </td>

                               <td class="text-center">
                             <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->other_remember_anther}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            ٦١٤
                        </td>
                        <td>
                        <p class="mb-0"> طيب الإيصالات الي مضيت عليها كانت بنص قيمة القرض ولا بزيادة؟</p>
                        </td>
                        <td>
                               <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                              نفس القيمه<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($lending_background->receipts_spent_value_loan_increase =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                             زياده عن القيمة<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;"> @if($lending_background->receipts_spent_value_loan_increase =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                               وقعت علي بياض<span class="underline underline--dotted " style="padding-left:5%;padding-right: 5%;"> @if($lending_background->receipts_spent_value_loan_increase =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->receipts_spent_value_loan_increase_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                        <td>
                            ٦١٥
                        </td>
                        <td>
                        <p class="mb-0"> ممكن تقولي هل حضرتك تأخرت ولو مرة واحدة في دفع أقساط اقرض اللي حصلت علية؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->have_late_paying =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->have_late_paying =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->have_late_paying_Notes}}</span>
                        </td>
                    </tr>

                       <tr>
                        <td>
                            ٦١٦
                        </td>
                        <td>
                        <p class="mb-0"> ممكن تقولي أيه كانت نتيجة تأخرك في دفع الأقساط؟</p>
                        </td>
                        <td>
                           <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                              دفع فائدة<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 7%;"> @if($lending_background->say_result_delay =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                             دفع رسوم<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;"> @if($lending_background->say_result_delay =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                              لا شئ<span class="underline underline--dotted " style="padding-left:8%;padding-right:8%;"> @if($lending_background->say_result_delay =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                                 <li>
                              أخري تذكر<span class="underline underline--dotted " style="padding-left:6%;padding-right: 7%;"> @if($lending_background->say_result_delay =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                                </li>
                            </ul>

                            <span class="mt-2 underline underline--dotted" > {{$lending_background->say_result_delay_Anther}}</span>


                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->say_result_delay_Notes}}</span>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            ٦١٧
                        </td>
                        <td>
                          <p>  ممكن تقوللي هل المؤسسة المالية أو الوكالة تقوم بالاتصال بك للسؤال عن المدفوعات المفترض دفعها عند التأخرفي الدفع؟</p>
                        </td>
                        <td >
                              <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                المكالمات الهاتفية<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->does_financial_institution_agency =='A') <i class="fas fa-check"></i> @endif</span> A
                                </li>
                                <li>
                               خطابات<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($lending_background->does_financial_institution_agency =='B') <i class="fas fa-check"></i> @endif</span> B
                                </li>
                                <li>
                              مقابلات/زيارات<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->does_financial_institution_agency =='C') <i class="fas fa-check"></i> @endif</span> C
                                </li>
                                <li>
                               البريد الالكتروني<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->does_financial_institution_agency =='D') <i class="fas fa-check"></i> @endif</span> D
                                </li>
                                <li>
                                رسالات نصية<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->does_financial_institution_agency =='E') <i class="fas fa-check"></i> @endif</span> E
                                </li>
                                <li>
                               لم يتصل بي أحد<span class="underline underline--dotted " style="padding-left: 8%;padding-right: 8%;"> @if($lending_background->does_financial_institution_agency =='F') <i class="fas fa-check"></i> @endif</span> F
                                </li>
                                <li>
                                أخري تذكر<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 12%;"> @if($lending_background->does_financial_institution_agency =='X') <i class="fas fa-check"></i> @endif</span> X
                                </li>
                            </ul>

                              @if($lending_background->does_financial_institution_agency_Anther)
                                   <p class="mt-2 mb-0">   اخري :  {{$lending_background->does_financial_institution_agency_Anther}}</p>
                               @endif
                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->does_financial_institution_agency_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            ٦١٨
                        </td>
                        <td>
                        <p class="mb-0"> هل حاولت المؤسسة المقرضة إعادة جدولة القرض في حالة تعثرك عن السداد؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->lender_reinstate_case =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->lender_reinstate_case =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->lender_reinstate_case_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            ٦١٩
                        </td>
                        <td>
                        <p class="mb-0"> طب هل حضرتك طلبت إعادة جدولة القرض في حالة تعثرك عن السداد؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->reschedule_loan_case  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->reschedule_loan_case =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->reschedule_loan_case_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                        <td>
                            ٦٢٠
                        </td>
                        <td>
                        <p class="mb-0"> طب ممكن تقوللي وأيه كان رد المؤسسة علي طلبك؟</p>
                        </td>
                        <td>
                           <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                              المؤسسة رفضت الطلب<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($lending_background->tell_institution_response =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                             تمت المناقشات ولم نصل إلي اتفاق<span class="underline underline--dotted " style="padding-left: 6%;padding-right: 6%;"> @if($lending_background->tell_institution_response =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                              تم قبول إعادة جدول القرض<span class="underline underline--dotted " style="padding-left:5%;padding-right: 5%;"> @if($lending_background->tell_institution_response =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                            </ul>


                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->tell_institution_response_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                        <td>
                            ٦٢١
                        </td>
                        <td>
                        <p class="mb-0"> طب هل لجأت المؤسسة المقرضة للقضاء لحل المنازعة بينك وبينهم؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->lending_institution_resort  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->lending_institution_resort =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->lending_institution_resort_Notes}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            ٦٢٢
                        </td>
                        <td>
                        <p class="mb-0">كم عدد الايصالات التي تم رفعها للمحكمة؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    كل الايصلات<span class="underline underline--dotted " style="padding-left:19%;padding-right:18%;"> @if($lending_background->many_receipts_been_submitted  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>

                                <li>
                                 <div class="row col-md-12" >  عدد منها  <span class="mr-4 mt-2"> أذكر العدد </span> <table class="no-margin-button ml-2 col-md-2  mt-2  col-md-3" ><tr> <td  class="pt-1 pb-1"> {{$lending_background->many_receipts_been_submitted_number}}  </td> </tr></table>  </span> <span class="ml-2">  <span class="mt-2">٢ </span> </span>  </div>
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->many_receipts_been_submitted_Notes}}</span>
                        </td>
                    </tr>

                            <tr>
                        <td>
                            ٦٢٣
                        </td>
                        <td>
                        <p class="mb-0"> هل صدر حكم في هذة الايصالات؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($lending_background->ruling_these_receipts  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($lending_background->ruling_these_receipts =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->ruling_these_receipts_Notes}}</span>
                        </td>
                    </tr>

                         <tr>
                        <td>
                            ٦٢٤
                        </td>
                        <td>
                        <p class="mb-0">ممكن تقوللي النزاع اتفض بعد اد ايه؟</p>
                        </td>
                        <td>
                            <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                 <div class="row col-md-12" >  نعم اتفض    <span class="mr-4 mt-2"> أذكر المدة </span> <table class="no-margin-button ml-2 col-md-2  col-md-2  " ><tr> <td  class="pt-1 pb-1 text-center"> {{$lending_background->tell_dispute_ended_number}}  </td> </tr></table> </span> <span class="mt-2"> ١</span> </div>
                                </li>

                                <li>
                                 <div class="row col-md-12" > لم ينفض النزاع  <span class="underline underline--dotted " style="padding-left:19%;padding-right:18%;"> @if($lending_background->tell_dispute_ended_number  =='٢') <i class="fas fa-check"></i> @endif</span> ٢ </span>  </div>
                                </li>
                            </ul>

                        </td>
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$lending_background->tell_dispute_ended_Notes}}</span>
                        </td>
                    </tr>


                     <tr>
                            <td >٦٢٥</td>
                            <td>
                                <p class="mt-2">ممكن تقولي ايه هي الأسباب اللي دفعتك لتتأخر في دفع الأقساط؟</p>
                            </td>
                            @if($lending_background->what_reasons_pushed1  = null || $lending_background->what_reasons_pushed2 != null || $lending_background->what_reasons_pushed3 != null ||$lending_background->what_reasons_pushed4 != null)
                            <td>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed1}}</span> ١ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed2}}</span> ٢ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed3}}</span> ٣ </p>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed4}}</span> ٤ </p>
                            </td>
                            @else
                             <td>
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed1}}</span> ١
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed2}}</span> ٢
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed3}}</span> ٣
                                <p class="mt-0 mb-0"> <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;">  {{$lending_background->what_reasons_pushed4}}</span> ٤
                           </td>
                            @endif
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 10%;padding-right:10%;"> {{$lending_background->what_guarantees_provided_Notes}}</span>
                            </td>
                    </tr>


                    @endforeach
                    </table>
                    </div>


                     <div class="text-center text-bold margin-print-3" > سابعاً: التكافل الاجتماعي</div>
                     <div class="table-responsive">
                        <table class="table table-bordered-bold mt-4">
                         @foreach($searchCase->social_solidarity as $social_solidarity)
                                            <tr>
                                                <td style="width:4%;">
                                                ٧٠١
                                                </td>
                                                <td style="width: 30%">
                                                هل الأسرة بتاخد اي مساعدة من جهة خيرية أو أفراد؟
                                                </td>
                                                <td>
                                                  <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->take_help_from_charitable  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                                        </li>
                                                        <li>
                                                            لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->take_help_from_charitable =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->take_help_from_charitable_Notes}} </span>
                                                </td>
                                            </tr>


                                               <tr>
                                                <td>
                                                ٧٠٢
                                                </td>
                                                <td>
                                                 هل المساعدة دي منتظمة (شهرية،سنوية)؟
                                                </td>
                                                <td>
                                                  <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            شهرية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->assistance_regular  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                                        </li>
                                                        <li>
                                                            موسمية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->assistance_regular =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                                        </li>
                                                        <li>
                                                            سنوية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->assistance_regular =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                                        </li>
                                                        <li>
                                                            غير منتظمة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->assistance_regular =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                                        </li>

                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->assistance_regular_Notes}} </span>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td>
                                                ٧٠٣
                                                </td>
                                                <td>
                                                    هل المساعدات دي نقدية ولا عينية ولا رعاية صية مجانية؟
                                                 </td>
                                                <td>
                                                  <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            نقدية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->aid_cash_or_kind  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                                        </li>
                                                        <li>
                                                            عينية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->aid_cash_or_kind =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                                        </li>
                                                        <li>
                                                            نقدية وعينية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->aid_cash_or_kind =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                                        </li>
                                                        <li>
                                                            رعايه صحية <span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->aid_cash_or_kind =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                                        </li>

                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->aid_cash_or_kind_Notes}} </span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                ٧٠٤
                                                </td>
                                                <td>
                                                    هل استفدت من مشروعات الجمعيات/المؤسسات الخيرية؟
                                                 </td>
                                                <td>
                                                    <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            نعم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->benefited_from_projects  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                                        </li>
                                                        <li>
                                                            لا<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($social_solidarity->benefited_from_projects  =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                                        </li>
                                                     </ul>

                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->benefited_from_projects_Notes}} </span>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td>
                                                ٧٠٥
                                                </td>
                                                <td>
                                                 ما هي الجمعيات/المؤسسات الخيرية التي استفدت منها؟
                                                 </td>
                                                <td>
                                                     <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            مؤسسة مصر الخير<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->charities_have_benefited  =='A') <i class="fas fa-check"></i> @endif</span> A
                                                        </li>
                                                        <li>
                                                            جمعية الأرمان<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($social_solidarity->charities_have_benefited =='B') <i class="fas fa-check"></i> @endif</span> B
                                                        </li>
                                                        <li>
                                                            مؤسسة صناع الخير للتنمية<span class="underline underline--dotted " style="padding-left: 8%;padding-right:7%;"> @if($social_solidarity->charities_have_benefited =='C') <i class="fas fa-check"></i> @endif</span> C
                                                        </li>
                                                        <li>
                                                            مؤسسة صناع الحياة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->charities_have_benefited =='D') <i class="fas fa-check"></i> @endif</span> D
                                                        </li>
                                                         <li>
                                                          بنك الطعام المصري<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 12%;"> @if($social_solidarity->charities_have_benefited =='E') <i class="fas fa-check"></i> @endif</span> E
                                                        </li>
                                                         <li>
                                                            جمعية التطوير والتنمية<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 11%;"> @if($social_solidarity->charities_have_benefited =='F') <i class="fas fa-check"></i> @endif</span> F
                                                        </li>
                                                         <li>
                                                           بنك الحياة الكريمة<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($social_solidarity->charities_have_benefited =='G') <i class="fas fa-check"></i> @endif</span> G
                                                        </li>
                                                         <li>
                                                            مؤسسة العربي<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 16%;"> @if($social_solidarity->charities_have_benefited =='H') <i class="fas fa-check"></i> @endif</span> H
                                                        </li>
                                                         <li>
                                                            بنك الشفاء المصري<span class="underline underline--dotted " style="padding-left:14%;padding-right:14%; "> @if($social_solidarity->charities_have_benefited =='I') <i class="fas fa-check"></i> @endif</span> I
                                                        </li>
                                                         <li>
                                                            اسمعونا<span class="underline underline--dotted " style="padding-left: 21%;padding-right: 22%;"> @if($social_solidarity->charities_have_benefited =='J') <i class="fas fa-check"></i> @endif</span> J
                                                        </li>
                                                         <li>
                                                            جمعية راعي مصر<span class="underline underline--dotted " style="padding-left:15%;padding-right:15%; "> @if($social_solidarity->charities_have_benefited =='K') <i class="fas fa-check"></i> @endif</span> K
                                                        </li>
                                                         <li>
                                                            جمعية مصطفي محمود<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 11%;"> @if($social_solidarity->charities_have_benefited =='L') <i class="fas fa-check"></i> @endif</span> L
                                                        </li>
                                                         <li>
                                                            الهيئة القبطية الإنجيلية<span class="underline underline--dotted " style="padding-left:11%;padding-right:11%; "> @if($social_solidarity->charities_have_benefited =='M') <i class="fas fa-check"></i> @endif</span> M
                                                        </li>
                                                         <li>
                                                            الطفولة والتنمية بأسيوط<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 9%;"> @if($social_solidarity->charities_have_benefited =='N') <i class="fas fa-check"></i> @endif</span> N
                                                        </li>
                                                         <li>
                                                            رعاية أطفال السجينات<span class="underline underline--dotted " style="padding-left:12%;padding-right:12%; "> @if($social_solidarity->charities_have_benefited =='O') <i class="fas fa-check"></i> @endif</span> O
                                                        </li>
                                                         <li>
                                                            مؤسسة بصيرة<span class="underline underline--dotted " style="padding-left: 17%;padding-right: 17%;"> @if($social_solidarity->charities_have_benefited =='P') <i class="fas fa-check"></i> @endif</span> P
                                                        </li>
                                                         <li>
                                                            مؤسسة مصر للصحة والتنمية<span class="underline underline--dotted " style="padding-left:6%;padding-right:6%; "> @if($social_solidarity->charities_have_benefited =='Q') <i class="fas fa-check"></i> @endif</span> Q
                                                        </li>
                                                        <li>
                                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:20%;padding-right:20%; "> @if($social_solidarity->charities_have_benefited =='X') <i class="fas fa-check"></i> @endif</span> X
                                                        </li>

                                                         @if($social_solidarity->charities_have_benefited_anther)
                                                                <p class="mt-2 mb-0">   اخري :  {{$social_solidarity->charities_have_benefited_anther}}</p>
                                                         @endif
                                                    </ul>

                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->charities_have_benefited_Notes}} </span>
                                                </td>
                                            </tr>


                                             <tr>
                                                <td>
                                                ٧٠٦
                                                </td>
                                                <td>
                                               ما مجالات الإستفادة من هذة الجمعيات/المؤسسات؟
                                                 </td>
                                                <td>
                                                     <ul style="list-style: none;margin: 0;padding: 0;">
                                                        <li>
                                                            محو الأمية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->areas_benefit  =='A') <i class="fas fa-check"></i> @endif</span> A
                                                        </li>
                                                        <li>
                                                            تسديد ديون<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->areas_benefit =='B') <i class="fas fa-check"></i> @endif</span> B
                                                        </li>
                                                        <li>
                                                           أكشاك<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($social_solidarity->areas_benefit =='C') <i class="fas fa-check"></i> @endif</span> C
                                                        </li>
                                                        <li>
                                                            علاج/إجراء عمليات<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($social_solidarity->areas_benefit =='D') <i class="fas fa-check"></i> @endif</span> D
                                                        </li>
                                                         <li>
                                                          مشروع مواشي<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($social_solidarity->areas_benefit =='E') <i class="fas fa-check"></i> @endif</span> E
                                                        </li>
                                                         <li>
                                                            ترميم منازل<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->areas_benefit =='F') <i class="fas fa-check"></i> @endif</span> F
                                                        </li>
                                                         <li>
                                                           مصروفات تعليم<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($social_solidarity->areas_benefit =='G') <i class="fas fa-check"></i> @endif</span> G
                                                        </li>
                                                         <li>
                                                            كراتين غذاء<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->areas_benefit =='H') <i class="fas fa-check"></i> @endif</span> H
                                                        </li>
                                                         <li>
                                                            بطاطين<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($social_solidarity->areas_benefit =='I') <i class="fas fa-check"></i> @endif</span> I
                                                        </li>
                                                         <li>
                                                            اعادة بناء<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($social_solidarity->areas_benefit =='J') <i class="fas fa-check"></i> @endif</span> J
                                                        </li>
                                                         <li>
                                                            سقف<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($social_solidarity->areas_benefit =='K') <i class="fas fa-check"></i> @endif</span> K
                                                        </li>
                                                         <li>
                                                            بناء دورة مياة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($social_solidarity->areas_benefit =='L') <i class="fas fa-check"></i> @endif</span> L
                                                        </li>
                                                         <li>
                                                              ترنش<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($social_solidarity->areas_benefit =='M') <i class="fas fa-check"></i> @endif</span> M
                                                        </li>
                                                         <li>
                                                            صرف صحي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->areas_benefit =='N') <i class="fas fa-check"></i> @endif</span> N
                                                        </li>
                                                         <li>
                                                            توصيل مياة<span class="underline underline--dotted " style="padding-left:13%;padding-right:12%; "> @if($social_solidarity->areas_benefit =='O') <i class="fas fa-check"></i> @endif</span> O
                                                        </li>
                                                         <li>
                                                            كهرباء<span class="underline underline--dotted " style="padding-left: 17%;padding-right: 17%;"> @if($social_solidarity->areas_benefit =='P') <i class="fas fa-check"></i> @endif</span> P
                                                        </li>
                                                         <li>
                                                            مستلزمات منزل<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($social_solidarity->areas_benefit =='Q') <i class="fas fa-check"></i> @endif</span> Q
                                                        </li>
                                                        <li>
                                                            اجهزة تعويضيه<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 11%;"> @if($social_solidarity->areas_benefit =='R') <i class="fas fa-check"></i> @endif</span> R
                                                        </li>
                                                        <li>
                                                            تزوج أيتام<span class="underline underline--dotted " style="padding-left: 15%;padding-right: 15%;"> @if($social_solidarity->areas_benefit =='S') <i class="fas fa-check"></i> @endif</span> S
                                                        </li>
                                                        <li>
                                                            تجهيز عرائس<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->areas_benefit =='T') <i class="fas fa-check"></i> @endif</span> T
                                                        </li>
                                                        <li>
                                                            تقديم مشروع<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->areas_benefit =='U') <i class="fas fa-check"></i> @endif</span> U
                                                        </li>
                                                        <li>
                                                            قروض<span class="underline underline--dotted " style="padding-left: 18%;padding-right: 18%;"> @if($social_solidarity->areas_benefit =='V') <i class="fas fa-check"></i> @endif</span> V
                                                        </li>
                                                        <li>
                                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($social_solidarity->areas_benefit =='X') <i class="fas fa-check"></i> @endif</span> X
                                                        </li>

                                                         @if($social_solidarity->areas_benefit_anther)
                                                                <p class="mt-2 mb-0">   اخري :  {{$social_solidarity->areas_benefit_anther}}</p>
                                                         @endif
                                                    </ul>

                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->areas_benefit_Notes}} </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                ٧٠٧
                                                </td>
                                                <td>
                                                ايه أهم الاحتياجات الي انت شايف انك محتاجها؟
                                                 </td>
                                                <td>
                                                    <ul style="list-style:none;margin:0;padding: 0;">
                                                        <li>
                                                            محو الأمية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($social_solidarity->most_important_needs  =='A') <i class="fas fa-check"></i> @endif</span> A
                                                        </li>
                                                        <li>
                                                            تسديد ديون<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->most_important_needs =='B') <i class="fas fa-check"></i> @endif</span> B
                                                        </li>
                                                        <li>
                                                           أكشاك<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($social_solidarity->most_important_needs =='C') <i class="fas fa-check"></i> @endif</span> C
                                                        </li>
                                                        <li>
                                                            علاج/إجراء عمليات<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($social_solidarity->most_important_needs =='D') <i class="fas fa-check"></i> @endif</span> D
                                                        </li>
                                                         <li>
                                                          مشروع مواشي<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($social_solidarity->most_important_needs =='E') <i class="fas fa-check"></i> @endif</span> E
                                                        </li>
                                                         <li>
                                                            ترميم منازل<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->most_important_needs =='F') <i class="fas fa-check"></i> @endif</span> F
                                                        </li>
                                                         <li>
                                                           مصروفات تعليم<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($social_solidarity->most_important_needs =='G') <i class="fas fa-check"></i> @endif</span> G
                                                        </li>
                                                         <li>
                                                            كراتين غذاء<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->most_important_needs =='H') <i class="fas fa-check"></i> @endif</span> H
                                                        </li>
                                                         <li>
                                                            بطاطين<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($social_solidarity->most_important_needs =='I') <i class="fas fa-check"></i> @endif</span> I
                                                        </li>
                                                         <li>
                                                            اعادة بناء<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($social_solidarity->most_important_needs =='J') <i class="fas fa-check"></i> @endif</span> J
                                                        </li>
                                                         <li>
                                                            سقف<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($social_solidarity->most_important_needs =='K') <i class="fas fa-check"></i> @endif</span> K
                                                        </li>
                                                         <li>
                                                            بناء دورة مياة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($social_solidarity->most_important_needs =='L') <i class="fas fa-check"></i> @endif</span> L
                                                        </li>
                                                         <li>
                                                              ترنش<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($social_solidarity->most_important_needs =='M') <i class="fas fa-check"></i> @endif</span> M
                                                        </li>
                                                         <li>
                                                            صرف صحي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($social_solidarity->most_important_needs =='N') <i class="fas fa-check"></i> @endif</span> N
                                                        </li>
                                                         <li>
                                                            توصيل مياة<span class="underline underline--dotted " style="padding-left:13%;padding-right:12%; "> @if($social_solidarity->most_important_needs =='O') <i class="fas fa-check"></i> @endif</span> O
                                                        </li>
                                                         <li>
                                                            كهرباء<span class="underline underline--dotted " style="padding-left: 17%;padding-right: 17%;"> @if($social_solidarity->most_important_needs =='P') <i class="fas fa-check"></i> @endif</span> P
                                                        </li>
                                                         <li>
                                                            مستلزمات منزل<span class="underline underline--dotted " style="padding-left:10%;padding-right:10%; "> @if($social_solidarity->most_important_needs =='Q') <i class="fas fa-check"></i> @endif</span> Q
                                                        </li>
                                                        <li>
                                                            اجهزة تعويضيه<span class="underline underline--dotted " style="padding-left: 11%;padding-right: 11%;"> @if($social_solidarity->most_important_needs =='R') <i class="fas fa-check"></i> @endif</span> R
                                                        </li>
                                                        <li>
                                                            تزوج أيتام<span class="underline underline--dotted " style="padding-left: 15%;padding-right: 15%;"> @if($social_solidarity->most_important_needs =='S') <i class="fas fa-check"></i> @endif</span> S
                                                        </li>
                                                        <li>
                                                            تجهيز عرائس<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->most_important_needs =='T') <i class="fas fa-check"></i> @endif</span> T
                                                        </li>
                                                        <li>
                                                            تقديم مشروع<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($social_solidarity->most_important_needs =='U') <i class="fas fa-check"></i> @endif</span> U
                                                        </li>
                                                        <li>
                                                            قروض<span class="underline underline--dotted " style="padding-left: 18%;padding-right: 18%;"> @if($social_solidarity->most_important_needs =='V') <i class="fas fa-check"></i> @endif</span> V
                                                        </li>
                                                        <li>
                                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($social_solidarity->most_important_needs =='X') <i class="fas fa-check"></i> @endif</span> X
                                                        </li>

                                                         @if($social_solidarity->most_important_needs_anther)
                                                                <p class="mt-2 mb-0">   اخري :  {{$social_solidarity->most_important_needs_anther}}</p>
                                                            @endif
                                                    </ul>

                                                </td>
                                                <td class="text-center">
                                                  <span class=" underline underline--dotted " style="padding-left: 6%;padding-right:6%;"> {{$social_solidarity->most_important_needs_Notes}} </span>
                                                </td>
                                            </tr>
                            @endforeach
                        </table>
                        </div>

                <div class="text-center text-bold margin-print-8" >  أولاً: توصيف الإعاقة</div>

                <div class="table-responsive">
                <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td>
                            م
                        </td>
                        <td style="width:20%">
                            المؤشر
                        </td>
                        <td>
                             الفرد الأول
                        </td>
                        <td>
                            الفرد الثاني
                        </td>
                        <td>
                            الفرد الثالث
                        </td>
                        <td class="text-center">
                            ملاحظات
                        </td>
                    </tr>

                    <tr>
                        <td>
                            ١٠١
                        </td>
                        <td>
                            اسم  الفرد المعاق
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td class="text-center">
                                 <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabilitie->disabled_persons_name}} </span>
                        </td>
                      @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes1}}</span>
                        </td>
                    @endforeach
                    </tr>

                    <tr>
                        <td>
                            ١٠٢
                        </td>
                        <td>
                            رقم سطر الفرد في جدول  الأسرة المعيشية؟
                        </td>
                       @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                            <table class="no-margin-button ml-2  mt-2  col-md-5" ><tr> <td  class="pt-2 pb-2"> {{$disabilitie->number_household_table}} </td> </tr></table>
                        </td>
                      @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes2}}</span>
                        </td>
                    @endforeach
                    </tr>

                    <tr>
                        <td>
                            ١٠٣
                        </td>
                        <td>
                            هل (الفرد) يعاني  من أي إعاقة؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->have_any_disability =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->have_any_disability  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes3}}</span>
                        </td>
                    @endforeach
                    </tr>

                    <tr>
                        <td>
                            ١٠٤
                        </td>
                        <td>
                            حدد نوع الاعاقة
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                           <ul style="list-style: none;margin: 0;padding: 0;">
                                <li>
                                    ذهنية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->type_of_disability  =='١') <i class="fas fa-check"></i> @endif</span> ١
                                </li>
                                <li>
                                    سمعية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٢') <i class="fas fa-check"></i> @endif</span> ٢
                                </li>
                                <li>
                                    بصرية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٣') <i class="fas fa-check"></i> @endif</span> ٣
                                </li>
                                <li>
                                    حركية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٤') <i class="fas fa-check"></i> @endif</span> ٤
                                </li>
                                 <li>
                                    سمع بصرية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٥') <i class="fas fa-check"></i> @endif</span> ٥
                                </li>
                                 <li>
                                    قصار قامة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٦') <i class="fas fa-check"></i> @endif</span> ٦
                                </li>
                                <li>
                                    طيف توحد<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٧') <i class="fas fa-check"></i> @endif</span> ٧
                                </li>
                                <li>
                                    مرض مزمن<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٨') <i class="fas fa-check"></i> @endif</span> ٨
                                </li>
                                <li>
                                    صعوبات تعلم<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٩') <i class="fas fa-check"></i> @endif</span> ٩
                                </li>
                                <li>
                                    متعدد الاعاقة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='١٠') <i class="fas fa-check"></i> @endif</span> ١٠
                                </li>
                                <li>
                                    أخري تذكر<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%; "> @if($disabilitie->type_of_disability =='٩٩') <i class="fas fa-check"></i> @endif</span> ٩٩
                                </li>
                                @if($disabilitie->type_of_disability_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->type_of_disability_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes4}}</span>
                            </td>
                        @endforeach
                        </tr>


                    <tr>
                        <td>
                            ١٠٥
                        </td>
                        <td>
                           ما هي درجة الإعاقة؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       خفيفة<span class="underline underline--dotted padding-width-2">@if($disabilitie->degree_disability =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        متوسطة<span class="underline underline--dotted padding-width-2">@if($disabilitie->degree_disability  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        عميقة<span class="underline underline--dotted padding-width-2">@if($disabilitie->degree_disability  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes5}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td>
                            ١٠٦
                        </td>
                        <td>
                            أي من الوسائل المُعينة تستخدمها لمساعدتك علي الإعتماد لمساعدتك علي الإعتماد علي نفسك؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                          <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                                نظارة<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->relevant_methods  =='A') <i class="fas fa-check"></i> @endif</span> A
                                        </li>
                                        <li>
                                            سماعة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->relevant_methods =='B') <i class="fas fa-check"></i> @endif</span> B
                                        </li>
                                        <li>
                                            قوقعة<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($disabilitie->relevant_methods =='C') <i class="fas fa-check"></i> @endif</span> C
                                        </li>
                                        <li>
                                            عصا بيضاء<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($disabilitie->relevant_methods =='D') <i class="fas fa-check"></i> @endif</span> D
                                        </li>
                                            <li>
                                            مشاية<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($disabilitie->relevant_methods =='E') <i class="fas fa-check"></i> @endif</span> E
                                        </li>
                                            <li>
                                            كرسي متحرك يدوي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->relevant_methods =='F') <i class="fas fa-check"></i> @endif</span> F
                                        </li>
                                            <li>
                                            كرسي متحرك كهربائي<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($disabilitie->relevant_methods =='G') <i class="fas fa-check"></i> @endif</span> G
                                        </li>
                                            <li>
                                            عكازات<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($disabilitie->relevant_methods =='H') <i class="fas fa-check"></i> @endif</span> H
                                        </li>
                                            <li>
                                            جهاز تعويضي يد<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($disabilitie->relevant_methods =='I') <i class="fas fa-check"></i> @endif</span> I
                                        </li>
                                            <li>
                                            جهاز تعويضي قدم<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($disabilitie->relevant_methods =='J') <i class="fas fa-check"></i> @endif</span> J
                                        </li>
                                            <li>
                                            حاس ألي مجهز<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($disabilitie->relevant_methods =='K') <i class="fas fa-check"></i> @endif</span> K
                                        </li>
                                            <li>
                                            بتطبيقات<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->relevant_methods =='L') <i class="fas fa-check"></i> @endif</span> L
                                        </li>
                                        <li>
                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($disabilitie->relevant_methods =='X') <i class="fas fa-check"></i> @endif</span> X
                                        </li>
                                @if($disabilitie->relevant_methods_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->relevant_methods_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes6}}</span>
                            </td>
                        @endforeach
                        </tr>



                <tr>
                <td>
                    ١٠٧
                </td>
                <td>
                    الخدمات التي يحصل/حصل عليها
                </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                          <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                         طيبة (علاج دوائي/تحاليل/وأشعة/جراحة)<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->services_receives  =='A') <i class="fas fa-check"></i> @endif</span> A
                                        </li>
                                        <li>
                                            تعلملية (الحاق بجامعات/مدارس/حضانات)<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->services_receives =='B') <i class="fas fa-check"></i> @endif</span> B
                                        </li>
                                        <li>
                                            تأهيل (علاج طبيعي/تخاطب/تعديل سلوك/ تدريب:تأهيل)<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($disabilitie->services_receives =='C') <i class="fas fa-check"></i> @endif</span> C
                                        </li>
                                        <li>
                                            أجهزة مساعدة(عصا/عكاكيز/كرسي متحرك،معينات سمعية ،معلينات بصرية)<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($disabilitie->services_receives =='D') <i class="fas fa-check"></i> @endif</span> D
                                        </li>
                                            <li>
                                            أجهزة تعويضية، أطرف صناعية<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($disabilitie->services_receives =='E') <i class="fas fa-check"></i> @endif</span> E
                                        </li>
                                            <li>
                                            شخص مساعد<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->services_receives =='F') <i class="fas fa-check"></i> @endif</span> F
                                        </li>
                                            <li>
                                           ضمان اجتماعي/ معاش كرامة<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($disabilitie->services_receives =='G') <i class="fas fa-check"></i> @endif</span> G
                                        </li>
                                            <li>
                                            توظيف<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($disabilitie->services_receives =='H') <i class="fas fa-check"></i> @endif</span> H
                                        </li>
                                            <li>
                                           قروض/مشروعات صغيرة<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($disabilitie->services_receives =='I') <i class="fas fa-check"></i> @endif</span> I
                                        </li>
                                            <li>
                                            بطاقة خدمات متكاملة<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($disabilitie->services_receives =='J') <i class="fas fa-check"></i> @endif</span> J
                                        </li>
                                            <li>
                                            بطاقة تأهيل<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($disabilitie->services_receives =='K') <i class="fas fa-check"></i> @endif</span> K
                                        </li>
                                        <li>
                                            بطاقة تموين<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->services_receives =='L') <i class="fas fa-check"></i> @endif</span> L
                                        </li>
                                        <li>
                                            تأمين صحي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->services_receives =='M') <i class="fas fa-check"></i> @endif</span> M
                                        </li>
                                          <li>
                                            إسكان إجتماعي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->services_receives =='N') <i class="fas fa-check"></i> @endif</span> N
                                        </li>
                                          <li>
                                            برامج تدخل مبكر<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->services_receives =='O') <i class="fas fa-check"></i> @endif</span> O
                                        </li>

                                        <li>
                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($disabilitie->services_receives =='X') <i class="fas fa-check"></i> @endif</span> X
                                        </li>
                                @if($disabilitie->services_receives_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->services_receives_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes7}}</span>
                            </td>
                        @endforeach
                    </tr>



                <tr>
                <td>
                    ١٠٨
                </td>
                <td>
                هل  سبق وحصل علي خدمة من أي من الجهات التالي ذكرها:
                </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                          <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        مركز/مستشفي حكومية<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->have_ever_obtained  =='A') <i class="fas fa-check"></i> @endif</span> A
                                        </li>
                                        <li>
                                            مركز/مستشفي خاصة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->have_ever_obtained =='B') <i class="fas fa-check"></i> @endif</span> B
                                        </li>
                                        <li>
                                        جمعيات أهلية<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($disabilitie->have_ever_obtained =='C') <i class="fas fa-check"></i> @endif</span> C
                                        </li>
                                        <li>
                                        شركات قطاع خاص<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($disabilitie->have_ever_obtained =='D') <i class="fas fa-check"></i> @endif</span> D
                                        </li>
                                        <li>
                                        حضانات ذوي إعاقة<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($disabilitie->have_ever_obtained =='E') <i class="fas fa-check"></i> @endif</span> E
                                        </li>
                                        <li>
                                         مراكز لغوية<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->have_ever_obtained =='F') <i class="fas fa-check"></i> @endif</span> F
                                        </li>
                                        <li>
                                        مكاتب تأهيل<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($disabilitie->have_ever_obtained =='G') <i class="fas fa-check"></i> @endif</span> G
                                        </li>
                                        <li>
                                         مراكز تأهيل<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($disabilitie->have_ever_obtained =='H') <i class="fas fa-check"></i> @endif</span> H
                                        </li>
                                            <li>
                                          مصانع أطراف تعويضية<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($disabilitie->have_ever_obtained =='I') <i class="fas fa-check"></i> @endif</span> I
                                        </li>
                                            <li>
                                           مراكز علاج طبيعي<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($disabilitie->have_ever_obtained =='J') <i class="fas fa-check"></i> @endif</span> J
                                        </li>
                                        <li>
                                           مراكز قياس مهارات<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($disabilitie->have_ever_obtained =='K') <i class="fas fa-check"></i> @endif</span> K
                                        </li>
                                        <li>
                                          مؤسسات تأهيل مهني<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->have_ever_obtained =='L') <i class="fas fa-check"></i> @endif</span> L
                                        </li>
                                        <li>
                                        مؤسسات رعاية<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->have_ever_obtained =='M') <i class="fas fa-check"></i> @endif</span> M
                                        </li>
                                          <li>
                                           مؤسسات توظيف<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->have_ever_obtained =='N') <i class="fas fa-check"></i> @endif</span> N
                                        </li>


                                        <li>
                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($disabilitie->have_ever_obtained =='X') <i class="fas fa-check"></i> @endif</span> X
                                        </li>
                                @if($disabilitie->have_ever_obtained_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->have_ever_obtained_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes8}}</span>
                            </td>
                        @endforeach
                        </tr>



                <tr>
                <td>
                    ١٠٩
                </td>
                <td>
                تحمل تكلفة العلاج
                </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                          <ul style="list-style: none;margin: 0;padding: 0;">
                                        <li>
                                        تأمين صحي<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->cost_treatment  =='A') <i class="fas fa-check"></i> @endif</span> A
                                        </li>
                                        <li>
                                            علي نفقة الدولة<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->cost_treatment =='B') <i class="fas fa-check"></i> @endif</span> B
                                        </li>
                                        <li>
                                        علي نفقة جمعية أهلية<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($disabilitie->cost_treatment =='C') <i class="fas fa-check"></i> @endif</span> C
                                        </li>
                                        <li>
                                       تبرعات<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($disabilitie->cost_treatment =='D') <i class="fas fa-check"></i> @endif</span> D
                                        </li>
                                        <li>
                                        علي نفقة الشخص نفسة<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($disabilitie->cost_treatment =='E') <i class="fas fa-check"></i> @endif</span> E
                                        </li>
                                          <li>
                                           مؤسسات توظيف<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->cost_treatment =='N') <i class="fas fa-check"></i> @endif</span> N
                                        </li>


                                        <li>
                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($disabilitie->cost_treatment =='X') <i class="fas fa-check"></i> @endif</span> X
                                        </li>
                                @if($disabilitie->cost_treatment_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->cost_treatment_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes9}}</span>
                            </td>
                        @endforeach
                        </tr>


                <tr>
                <td>
                    ١١٠
                </td>
                <td>
                ما هي الخدمات المطلوب الحصول عليها؟
                </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                          <ul style="list-style: none;margin: 0;padding: 0;">
                                         <li>
                                         طيبة (علاج دوائي/تحاليل/وأشعة/جراحة)<span class="underline underline--dotted " style="padding-left:13%;padding-right:13%;"> @if($disabilitie->the_services_obtained  =='A') <i class="fas fa-check"></i> @endif</span> A
                                        </li>
                                        <li>
                                            تعلملية (الحاق بجامعات/مدارس/حضانات)<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->the_services_obtained =='B') <i class="fas fa-check"></i> @endif</span> B
                                        </li>
                                        <li>
                                            تأهيل (علاج طبيعي/تخاطب/تعديل سلوك/ تدريب:تأهيل)<span class="underline underline--dotted " style="padding-left: 16%;padding-right: 15%;"> @if($disabilitie->the_services_obtained =='C') <i class="fas fa-check"></i> @endif</span> C
                                        </li>
                                        <li>
                                            أجهزة مساعدة(عصا/عكاكيز/كرسي متحرك،معينات سمعية ،معلينات بصرية)<span class="underline underline--dotted " style="padding-left: 7%;padding-right: 7%;"> @if($disabilitie->the_services_obtained =='D') <i class="fas fa-check"></i> @endif</span> D
                                        </li>
                                            <li>
                                            أجهزة تعويضية، أطرف صناعية<span class="underline underline--dotted " style="padding-left: 10%;padding-right: 10%;"> @if($disabilitie->the_services_obtained =='E') <i class="fas fa-check"></i> @endif</span> E
                                        </li>
                                            <li>
                                            شخص مساعد<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 12%;"> @if($disabilitie->the_services_obtained =='F') <i class="fas fa-check"></i> @endif</span> F
                                        </li>
                                            <li>
                                           ضمان اجتماعي/ معاش كرامة<span class="underline underline--dotted " style="padding-left: 9%;padding-right: 9%;"> @if($disabilitie->the_services_obtained =='G') <i class="fas fa-check"></i> @endif</span> G
                                        </li>
                                            <li>
                                            توظيف<span class="underline underline--dotted " style="padding-left: 13%;padding-right: 13%;"> @if($disabilitie->the_services_obtained =='H') <i class="fas fa-check"></i> @endif</span> H
                                        </li>
                                            <li>
                                           قروض/مشروعات صغيرة<span class="underline underline--dotted " style="padding-left:16%;padding-right:15%; "> @if($disabilitie->the_services_obtained =='I') <i class="fas fa-check"></i> @endif</span> I
                                        </li>
                                            <li>
                                            بطاقة خدمات متكاملة<span class="underline underline--dotted " style="padding-left: 14%;padding-right: 15%;"> @if($disabilitie->the_services_obtained =='J') <i class="fas fa-check"></i> @endif</span> J
                                        </li>
                                            <li>
                                            بطاقة تأهيل<span class="underline underline--dotted " style="padding-left:17%;padding-right:17%; "> @if($disabilitie->the_services_obtained =='K') <i class="fas fa-check"></i> @endif</span> K
                                        </li>
                                        <li>
                                            بطاقة تموين<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->the_services_obtained =='L') <i class="fas fa-check"></i> @endif</span> L
                                        </li>
                                        <li>
                                            تأمين صحي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->the_services_obtained =='M') <i class="fas fa-check"></i> @endif</span> M
                                        </li>
                                          <li>
                                            إسكان إجتماعي<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->the_services_obtained =='N') <i class="fas fa-check"></i> @endif</span> N
                                        </li>
                                          <li>
                                            برامج تدخل مبكر<span class="underline underline--dotted " style="padding-left: 12%;padding-right: 11%;"> @if($disabilitie->the_services_obtained =='O') <i class="fas fa-check"></i> @endif</span> O
                                        </li>
                                        <li>
                                            أخري تذكر<span class="underline underline--dotted " style="padding-left:16%;padding-right:16%; "> @if($disabilitie->the_services_obtained =='X') <i class="fas fa-check"></i> @endif</span> X
                                        </li>
                                @if($disabilitie->the_services_obtained_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->the_services_obtained_anther}}</p>
                                @endif
                            </ul>
                        </td>
                    @endforeach

                        @foreach($searchCase->disabled_note as $disabled_note)
                            <td class="text-center">
                            <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes10}}</span>
                            </td>
                        @endforeach
                        </tr>


                    <tr>
                        <td>
                            ١١١
                        </td>
                        <td>
                        السن عند حدوث الإعاقة؟
                        </td>
                       @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                         <div class=" row col-md-12">   <table class="no-margin-button ml-2  mt-2  col-md-5" ><tr> <td  class="pt-2 pb-2"> {{$disabilitie->age_time_disability}} </td> </tr></table>  <span class="col-md-6"> سنة  </span></div>
                        </td>
                      @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes11}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td>

                        </td>
                        <td>
                            هل (الإسم) يدرس حالياً؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->currently_studying =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->currently_studying  =='٢') <i class="fas fa-check"></i> @endif </span> ٢  <i class="ml-4 fas fa-long-arrow-alt-left"></i>  ١١٤
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes12}}</span>
                        </td>
                    @endforeach
                    </tr>


                <tr>
                        <td>
                            ١١٢
                        </td>
                        <td>
                        ايه هي المرحلة التعليمية الملتحق بها حالياً؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       ابتدائي<span class="underline underline--dotted padding-width-2">@if($disabilitie->What_educational_grade =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        اعدادي<span class="underline underline--dotted padding-width-2">@if($disabilitie->What_educational_grade  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        ثانوي<span class="underline underline--dotted padding-width-2">@if($disabilitie->What_educational_grade  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                        جامعي<span class="underline underline--dotted padding-width-2">@if($disabilitie->What_educational_grade  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                        أخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->What_educational_grade  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes13}}</span>
                        </td>
                    @endforeach
                    </tr>



                     <tr>
                        <td>
                            ١١٣
                        </td>
                        <td>
                        ايه هي المرحلة التعليمية الملتحق بها حالياً؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td >
                                 <div class="row col-md-12">  <span class="col-md-3">@if($disabilitie->What_educational_grade =='١') <i class="fas fa-check"></i> @endif  ١</span>
                                  <span class="col-md-3">@if($disabilitie->What_educational_grade =='٢') <i class="fas fa-check"></i> @endif  ٢</span>
                                  <span class="col-md-3">@if($disabilitie->What_educational_grade =='٣') <i class="fas fa-check"></i> @endif  ٣</span>
                                  <span class="col-md-3">@if($disabilitie->What_educational_grade =='٤') <i class="fas fa-check"></i> @endif  ٤</span>
                                 <span class="col-md-3">@if($disabilitie->What_educational_grade =='٥') <i class="fas fa-check"></i> @endif  ٥</span>
                                 <span class="col-md-3">@if($disabilitie->What_educational_grade =='٦') <i class="fas fa-check"></i> @endif  ٦</span>
                               <i class="ml-4 fas fa-long-arrow-alt-left mt-2"></i>  ٢٠١  </div>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes14}}</span>
                        </td>
                    @endforeach
                    </tr>


                <tr>
                        <td>
                            ١١٤
                        </td>
                        <td>
                       ايه سبب عدم التحاقة بالتعليم؟
                        </td>
                    @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       دون السن<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        أسباب مادية<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        اجتماعية<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                    عدم قدرتة علي التعليم<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                       أنهي التعليم<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                        أخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_for_not_attending  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>
                                 @if($disabilitie->reason_for_not_attending_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->reason_for_not_attending_anther}}</p>
                                @endif
                                </ul>

                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes15}}</span>
                        </td>
                    @endforeach
                    </tr>

                </table>
                </div>

         <div class="text-center text-bold"> ثانياً: مسببات الإعاقة</div>

         <div class="table-responsive">
                <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td class="text-center">
                            م
                        </td>
                        <td class="text-center" style="width:20%">
                            المؤشر
                        </td>
                        <td class="text-center">
                             الفرد الأول
                        </td>
                        <td class="text-center">
                            الفرد الثاني
                        </td>
                        <td class="text-center">
                            الفرد الثالث
                        </td>
                        <td class="text-center">
                            ملاحظات
                        </td>
                    </tr>
                     <tr>
                        <td class="text-center">
                            ٢٠١
                        </td>
                        <td >
                            هل حصل مع الأم مشكلة صحية اثناء الحمل؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->mother_have_health_problem =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->mother_have_health_problem  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->mother_have_health_problem  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes16}}</span>
                        </td>
                    @endforeach
                    </tr>

                     <tr>
                        <td class="text-center">
                            ٢٠٢
                        </td>
                        <td >
                        هل الولادة كانت متعسرة؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_difficult =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_difficult  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_difficult  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes17}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td class="text-center">
                            ٢٠٣
                        </td>
                        <td >
                        هل (الاسم) اتولد اقل من ٧شهور (مبتسر الحمل)؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->born_less_than_7_months_old =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->born_less_than_7_months_old  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->born_less_than_7_months_old  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes18}}</span>
                        </td>
                    @endforeach
                    </tr>



                    <tr>
                        <td class="text-center">
                            ٢٠٤
                        </td>
                        <td >
                        وزن (الاسم) عند الولادة اقل من٢,٥كجم؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_less_than =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_less_than  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->birth_less_than  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes19}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٢٠٥
                        </td>
                        <td >
                        هل عاني (الاسم) من الصفرا بعد الولادة؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_jaundice_after =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_jaundice_after  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_jaundice_after  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes20}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٢٠٦
                        </td>
                        <td >
                        هل عاني الاسم من تشنجات؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_cramps =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_cramps  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->suffer_from_cramps  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes21}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٢٠٧
                        </td>
                        <td >
                            هل تم حجز في حضانه لمدة تزيد عن يومين؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->Have_been_booked_nursery =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->Have_been_booked_nursery  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->Have_been_booked_nursery  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes22}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td class="text-center">
                            ٢٠٨
                        </td>
                        <td >
                            هل اصيب (الاسم) بالحمي الشوكية او الالتهاب السحائي؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->meningitis_or_meningitis =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->meningitis_or_meningitis  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                        لا تعرف<span class="underline underline--dotted padding-width-2">@if($disabilitie->meningitis_or_meningitis  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes23}}</span>
                        </td>
                    @endforeach
                    </tr>




                     <tr>
                        <td class="text-center">
                            ٢٠٩
                        </td>
                        <td >
                            هل الأم والأب بينهم صلة قرابة؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->mother_and_father_relationship =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->mother_and_father_relationship  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes24}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td class="text-center">
                            ٢١٠
                        </td>
                        <td>
                            هل تعرض (الاسم) إلي حادث أدي إلي الإعاقة؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->accident_that_led =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->accident_that_led  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes25}}</span>
                        </td>
                    @endforeach
                    </tr>



                    <tr>
                        <td class="text-center">
                            ٢١١
                        </td>
                        <td>
                        هل الإعاقة بسبب مرض مزمن؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->due_chronic_disease =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->due_chronic_disease  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes26}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td class="text-center">
                            ٢١٢
                        </td>
                        <td>
                            هل يوجد سبب أخر لهذة أدي إلي الإعاقة؟
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->another_reason_led =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->another_reason_led  =='٢') <i class="fas fa-check"></i> @endif </span> ٢ <i class="ml-4 fas fa-long-arrow-alt-left mt-2"></i>  ٣٠١
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes27}}</span>
                        </td>
                    @endforeach
                    </tr>



                     <tr>
                        <td class="text-center">
                            ٢١٣
                        </td>
                        <td>
                           أذكر السبب
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td class="text-center">
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       <span class="underline underline--dotted padding-width-2"> {{$disabilitie->tell_reason}} </span>
                                    </li>


                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes28}}</span>
                        </td>
                    @endforeach
                    </tr>

                    </table>
                    </div>





        <div class="text-center text-bold margin-print-8">  ثانياً: الإعاقة الحركية والأجهزة التعويضية</div>

        <div class="table-responsive">
                <table class="table table-bordered-bold mt-4">
                    <tr>
                        <td>
                            م
                        </td>
                        <td style="width:20%">
                            المؤشر
                        </td>
                        <td>
                             الفرد الأول
                        </td>
                        <td>
                            الفرد الثاني
                        </td>
                        <td>
                            الفرد الثالث
                        </td>
                        <td class="text-center">
                            ملاحظات
                        </td>
                    </tr>

                        <tr>
                        <td class="text-center">
                            ٣٠١
                        </td>
                        <td>
                        الوزن
                        </td>
                       @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                         <div class=" row col-md-12">   <table class="no-margin-button ml-2  mt-2  col-md-5" ><tr> <td  class="pt-2 pb-2 text-center"> {{$disabilitie->weight}} </td> </tr></table>  <span class="col-md-6"> كجم  </span></div>
                        </td>
                      @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes29}}</span>
                        </td>
                    @endforeach
                    </tr>



                    <tr>
                        <td class="text-center">
                            ٣٠٢
                        </td>
                        <td >
                        نوع البتر
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       تحت الركبة<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_type =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        فوق الركبة<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_type  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                         تحت الكوع<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_type  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                         فةق الكوع<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_type  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                          اخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_type  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>

                                     @if($disabilitie->amputation_type_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->amputation_type_anther}}</p>
                                     @endif

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes30}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٣٠٣
                        </td>
                        <td >
                       تاريخ البتر
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                         <td>
                         <div class=" row col-md-12">  شهر <table class="no-margin-button ml-2  mt-2  col-md-5" ><tr> <td  class="pt-2 pb-2 text-center"> {{substr($disabilitie->date_amputation_month,-2,2)}} </td> </tr></table>  </div>
                      <div class=" row col-md-12"> سنة  <table class="no-margin-button ml-2  mt-2  col-md-5" ><tr> <td  class="pt-2 pb-2 text-center"> {{substr($disabilitie->date_amputation_month,0,-3)}}  </td> </tr></table>  <span class="col-md-6">   </span></div>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes31}}</span>
                        </td>
                    @endforeach
                    </tr>



                     <tr>
                        <td class="text-center">
                            ٣٠٤
                        </td>
                        <td >
                        سبب البتر
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       حادث<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_amputation =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        الاصابة بمرض<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_amputation  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                         اصابة حادة<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_amputation  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                         حروق مثلاً<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_amputation  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                          اخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->reason_amputation  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>

                                     @if($disabilitie->reason_amputation_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->reason_amputation_anther}}</p>
                                     @endif

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes32}}</span>
                        </td>
                    @endforeach
                    </tr>




                     <tr>
                        <td class="text-center">
                            ٣٠٥
                        </td>
                        <td >
                        حالة البتر
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       ملتئم<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_case =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                       غير ملتئم<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_case  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                    مترهل<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_case  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                       غير مترهل<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_case  =='٤') <i class="fas fa-check"></i> @endif </span> ٤
                                    </li>
                                     <li>
                                     اخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_case  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>

                                     @if($disabilitie->amputation_case_anther)
                                    <p class="mt-2 mb-0">   اخري :  {{$disabilitie->amputation_case_anther}}</p>
                                     @endif

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes33}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٣٠٦
                        </td>
                        <td >
                       مستوي البتر
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       أسفل المنتصف<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_level =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                       مستوي المنتصف<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_level  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>
                                     <li>
                                    أعلي المنتصف<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_level  =='٣') <i class="fas fa-check"></i> @endif </span> ٣
                                    </li>
                                     <li>
                                     اخري تذكر<span class="underline underline--dotted padding-width-2">@if($disabilitie->amputation_level  =='٩') <i class="fas fa-check"></i> @endif </span> ٩
                                    </li>
                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes34}}</span>
                        </td>
                    @endforeach
                    </tr>



                     <tr>
                        <td class="text-center">
                            ٣٠٧
                        </td>
                        <td >
                        حالة الطرف
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       جيد<span class="underline underline--dotted padding-width-2">@if($disabilitie->party_status =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                      بحاجة للتدخل<span class="underline underline--dotted padding-width-2">@if($disabilitie->party_status  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes35}}</span>
                        </td>
                    @endforeach
                    </tr>


                     <tr>
                        <td class="text-center">
                            ٣٠٨
                        </td>
                        <td >
                       إمكانية إستخدام إي اجهزة تعويضية أو تأهيلية
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       ممكن<span class="underline underline--dotted padding-width-2">@if($disabilitie->use_any_compensatory =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                       غير ممكن<span class="underline underline--dotted padding-width-2">@if($disabilitie->use_any_compensatory  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes36}}</span>
                        </td>
                    @endforeach
                    </tr>


                    <tr>
                        <td class="text-center">
                            ٣٠٩
                        </td>
                        <td >
                         اي مشاكل طبية اخري
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->other_medical_problems =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->other_medical_problems  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes37}}</span>
                        </td>
                    @endforeach
                    </tr>





                    <tr>
                        <td class="text-center">
                            ٣١٠
                        </td>
                        <td >
                        اذكر المشاكل
                        </td>
                         @foreach($searchCase->disabilities as $disabilitie)
                        <td>
                                 <ul style="list-style: none;margin: 0;padding: 0;">
                                    <li>
                                       نعم<span class="underline underline--dotted padding-width-2">@if($disabilitie->mention_problems =='١') <i class="fas fa-check"></i> @endif  </span> ١
                                    </li>
                                    <li>
                                        لا<span class="underline underline--dotted padding-width-2">@if($disabilitie->mention_problems  =='٢') <i class="fas fa-check"></i> @endif </span> ٢
                                    </li>

                                </ul>
                        </td>
                    @endforeach

                    @foreach($searchCase->disabled_note as $disabled_note)
                        <td class="text-center">
                           <span class=" underline underline--dotted " style="padding-left: 17%;padding-right:17%;"> {{$disabled_note->disability_Notes38}}</span>
                        </td>
                    @endforeach
                    </tr>



                    </table>
                    </div>
                    </div>

              <!-- /.card -->
            </div>
          </div>

    </section>


    </div>

@endsection
