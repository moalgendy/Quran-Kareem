<!DOCTYPE html>

<html lang="en">

<head>

    <base href="/public">

    
    @include('dashboard.css')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        @include('dashboard.navbar')


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @extends('dashboard.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">اضافة آيه</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                                <li class="breadcrumb-item active">اضافة آيه </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <!-- /.col-md-6 -->
                        
            
                        <div class="main-panel">
                            <div class="content-wrapper">
                
                                
                
                
                                {{-- <div class="div_center"> --}}
                
                                    {{-- <h4 class="card-title">Add Products</h4> --}}
                                        <div class="row">
                                            
                                            <div class="col-20 grid-margin stretch-card">
                                                @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                            {{ session()->get('message') }}
                                                        </div>
                                                        @endif
                                                <div class="card" >
                                                    <div class="card-body">
                                                        <h4 class="card-title"> </h4>
                                                        
                                                        <form action="{{ url('add_listener') }}" method="Post" class="forms-sample" enctype="multipart/form-data">
                                                                @csrf

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">* اضافة الآيه باللغة العربية</label>
                                                                <input name="arabic" type="text" class="form-control"  id="exampleInputName1" placeholder="اضف الايه باللغة العربية" required>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">* اضافة الآيه باللغة الانجليزية</label>
                                                                <input name="english" type="text" class="form-control"  id="exampleInputName1" placeholder="اضف الايه باللغة الانجليزية" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputName1">* اسم السورة </label>
                                                                <br>
                                                                <select name="surah" class="form-select form-select-sm form-control" aria-label=".form-select-sm example">
                                                                    <option selected>اختر السورة</option>
                                                                    @foreach ($surahs as $surah)
                                                                    <option>{{ $surah->surah_name }}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                            </div>

                                                            {{-- <div class="form-group">
                                                                <label for="exampleInputName1">* اضافة آيه</label>
                                                                <input name="number" type="hidden" class="form-control"  id="exampleInputName1" placeholder="اضف نوع" required>
                                                            </div> --}}

                                                            <div class="form-group">
                                                                <label>* رفع المقطع</label>
                                                                <input type="file" name="audio" class="file-upload-default">
                                                            </div>
                                                            <hr>
                
                                                            
                                                            <button type="submit" class="btn btn-primary btn-icon-text">
                                                                <i class="mdi mdi-file-check btn-icon-prepend"></i>تأكيد الرفع
                                                            </button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                        
                                    </div>
                                
            
            
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        @include('dashboard.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

        @include('dashboard.script')
</body>