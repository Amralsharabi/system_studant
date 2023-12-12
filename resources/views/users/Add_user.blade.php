@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
اضافة مستخدم - نظام الحجز الالكتروني لمصلحة الاحوال المدنية


@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flatpickr.min.css')}}" rel="stylesheet">

    <style>
        .center1{
            display: flex;
            justify-content: center;
        }
        .nav-tabs .nav-link{
            border: 1px solid #0064e7 !important;
        }
        .nav-tabs .nav-link.active{
            border: 1px solid #ffffff !important;
        }
        .border{
            border: 1px solid #0064e7 !important;
        }.form-control{
            border: 1px solid #0064e7;
        }hr{
            background-color: #0064e7;
        }input{
            align-items: center;
        }.flatpickr-calendar{
        direction: rtl;
        font-family: Arial, Helvetica, sans-serif !important;
        }
    </style>
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                مستخدم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="card custom-card w-100" id="tab">
        <div class="card-body">
            <div class="card-body tab-content">
                <div class="tab-pane active show" id="tabCont1">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>خطا</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="wrapper" dir="rtl" >
                            <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" action="{{route('users.store','test')}}" method="post">
                                @csrf
                                <!-- tab 0 -->
                                <div  class="tab" id="tab-0" >
                                    <div class="container">
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
                                            <ul>
                                                    <h1 class="alert-heading">خطاء</h1>
                                                    <li>{{$error}}</li>
                                                </ul>
                                            </div>
                                            @endforeach
                                    </div>
                                    <section class="sec">
                                            <div class="container">
                                                <div class="row justify-content-center" >
                                                    <div id="createaccount " class="col-lg-11 mt-5 mt-lg-0 d-flex align-items-stretch" >
                                                        <div class="tooltip-demo">
                                                            <div class="row bg" dir="rtl" data-aos="flip-right">
                                                                <div class="title my-3" style="width: 100%;
                                                                text-align: center; color: black !important;">
                                                                    <h1 class="">إنـشـاء حـســاب</h1>
                                                                    <hr>
                                                                </div>
                    
                                                                <div class="form-group col-md-6">
                                                                    <label for="full_name">{{__('الاسم الكامل')}}</label>
                                                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" id="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" dir="ltr">
                                                                    @error('full_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                            <div class="form-group col-md-6">
                                                                <label for="email">{{__('الايميل')}}</label>
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" dir="ltr">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                    
                                                            <div class="form-group col-md-6">
                                                                <label for="password">{{__('كلمة المرور')}}</label>
                                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            
                    
                                                            <div class="form-group col-md-6">
                                                                <label for="password-confirm">{{__('تاكيد كلمة المرور')}}</label>
                                                                <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required autocomplete="new-password">
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="">{{__('حالة المستخدم')}}</label>
                                                                <select name="Status" id="select-beast" class="form-control custom-select" style="border: 1px solid #0064e7;">
                                                                    <option value="مفعل">مفعل</option>
                                                                    <option value="غير مفعل">غير مفعل</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="">{{__('صلاحية المستخدم')}}</label>
                                                                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="index-btn-wrapper justify-content-center mb-4" style="display: flex" dir="rtl">
                                        <button class="btn btn-primary" style="margin-left: 5px;">حــفــظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap-hijri-datetimepickermin.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/main.js')}}"></script>
<script src="{{URL::asset('assets/js/scr.js')}}"></script>
<script src="{{asset('assets/js/flatpickr.js')}}"></script>


<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection