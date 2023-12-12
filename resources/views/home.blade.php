@extends('layouts.master')
@section('title')
    نظام تحضير الطلاب
@endsection
@section('css')

<!--  Owl-carousel css-->
<link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/vue.js')}}"></script>
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!--div-->
    @can('الرئيسية')

        <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="" id="" name="selectForm2" action="{{route('attedn.create','test')}}" method="post">
                        @csrf
                        @method("GET")
                        <div class="card">
                            <div class="row mr-2 mt-3">
                                <div class="form-group ml-2">
                                    <label for="">الصف</label>
                                    <select class="form-control" name="classes" id="classes" v-model="classes" required>
                                        <option value="{{ $classes ?? '- - اختار صف دراسي - -'}}">{{$classes ?? '- - اختار صف دراسي - -'}}</option>
                                        @can('اول')
                                            <option value="الأول">الأول</option>
                                        @endcan
                                        @can('ثاني')
                                            <option value="الثاني">الثاني</option>
                                        @endcan
                                        @can('ثالث')
                                            <option value="الثالث">الثالث</option>
                                        @endcan
                                        @can('رابع')
                                            <option value="الرابع">الرابع</option>
                                        @endcan
                                        @can('خامس')
                                            <option value="الخامس">الخامس</option>
                                        @endcan
                                        @can('سادس')
                                            <option value="السادس">السادس</option>
                                        @endcan
                                        @can('سابع')
                                            <option value="السابع">السابع</option>
                                        @endcan
                                        @can('ثامن')
                                            <option value="الثامن">الثامن</option>
                                        @endcan
                                        @can('تاسع')
                                            <option value="التاسع">التاسع</option>
                                        @endcan
                                    </select>
                                </div>
                                <div class="form-group ml-2 ">
                                    <label for="">الشعبة</label>
                                    <select class="form-control" name="section" id="section" v-model="section" required>
                                        <option value="{{$section ?? '- - اختار شعبة - -'}}">{{$section ?? '- - اختار شعبة - -'}}</option>
                                        <option value="أ">أ</option>
                                        <option value="ب">ب</option>
                                        <option value="ج">جـ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success-gradient btn-block" style="margin-top: 29px"   >عرض</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

        <div class="col-xl-12">
        <div class="card">
            @if (isset($classes))
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">تحضير الطلاب</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <form class="" id="" name="selectForm3" action="{{route('attedn.store','test')}}" method="post">
                @csrf
                @method("POST")
            <div class="card-body">
                
                    <div class="table-responsive hoverable-table">

                        <table class="table table-hover" id="example1" data-page-length='50'>

                            <thead>
                                <tr style="text-align: center">
                                    <th class="wd-5p border-bottom-0">الرقم</th>
                                    <th class="wd-25p border-bottom-0">اسم الطلاب</th>
                                    <th class="wd-10p border-bottom-0">الصف</th>
                                    <th class="wd-5p border-bottom-0">الشعبة</th>
                                    <th class="wd-5p border-bottom-0">حضور</th>
                                    <th class="wd-5p border-bottom-0">غياب</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($students as $student)
                                    @php
                                        $i++;
                                    @endphp
                                <tr style="text-align: center">
                                    <td>{{$i}}</td>
                                    <td>{{$student->full_name}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>({{$student->section}})</td>
                                    <input type="hidden" name="studant_id" value="{{$student->id}}">
                                    <td><input type="radio" name="attedn_lacks" value="0" id="attedn" style="zoom: 200%"></td>
                                    <td><input type="radio" name="attedn_lacks" value="1" id="lacks" style="zoom: 200%"></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <div class="" style="width: 90%;">
                            <button class="btn btn-success-gradient btn-block">حفظ التحضير</button>
                        </div>
                    </div>

                
            </div><!-- bd -->
        </form>
        </div><!-- bd -->
        </div>
        @endif
            
        
    @endcan

    @can('تقرير_الحضور_والغيب')
        <div class="row">
        <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">تحضير الطالب</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>

            <div class="card-body">
                <div class="table">
                    <table class="table" id="example1">
                        <thead>
                            <tr style="text-align: center">
                                <th class="wd-5p border-bottom-0">الرقم</th>
                                <th class="wd-5p border-bottom-0">التاريخ</th>
                                <th class="wd-5p border-bottom-0">حضور</th>
                                <th class="wd-5p border-bottom-0">غياب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                        @endphp
                            @if (isset($attedns))
                            @foreach ($attedns as $attedn)
                            @php
                                        $i++;
                                    @endphp
                            <tr style="text-align: center">
                                <td>{{$i}}</td>
                                <td>{{$attedn->created_at->format('Y/m/d')}}</td>
                                
                                @if ($attedn->attedn_lacks == 0)
                                <td><input type="radio" name="w" id="" value="0" style="zoom: 200%"  checked></td>
                                @else
                                <td><input type="radio" name="w" id="" value="1" style="zoom: 200%"  checked></td>
                                @endif
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
        </div>
    @endcan
    

    </div>
    
    <!--/div-->
@endsection
@section('js')
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        // التحقق من توفر Vue
        if (typeof Vue !== 'undefined') {
          console.log('Vue.js تم تضمينها بنجاح.');
        } else {
          console.log('فشل تضمين Vue.js.');
        }
      </script>
@endsection
