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
        <div class="row">
        <div class="col-xl-12">
        <div class="card">
            {{-- @if (isset()) --}}
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">تحضير الطلاب</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        
                            <thead>
                                <tr style="text-align: center">
                                    <th class="wd-5p border-bottom-0">الرقم</th>
                                    <th class="wd-25p border-bottom-0">اسم الطلاب</th>
                                    <th class="wd-10p border-bottom-0">الصف</th>
                                    <th class="wd-5p border-bottom-0">الشعبة</th>
                                    <th class="wd-5p border-bottom-0">الحضور</th>
                                    <th class="wd-5p border-bottom-0">الغياب</th>
                                    <th class="wd-5p border-bottom-0">الحالة</th>
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
                                    <td style="color: green">{{$absenceCount = $student->attedns->where('attedn_lacks', 0)->count();}}</td>
                                    <td style="color: red">{{$absenceCount = $student->attedns->where('attedn_lacks', 1)->count();}}</td>
                                    <td>
                                        @if ($absenceCount > 3)
                                        <p style="color: red">منقطع</p>
                                        @else
                                        <p style="color: green">مستمر</p>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                
            </div><!-- bd -->
        </div><!-- bd -->
        </div>
        {{-- @endif --}}
            
        
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
