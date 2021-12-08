@extends('template.SideBar')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    تحديث معلومات الطبية
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <form action="{{url('StoreInformation')}}" method="POST">
                                                @csrf
                                                <div class="form-row align-items-center">
                                                    <div class="col-lg-12">
                                                        <label class="sr-only" for="inlineFormInput">العنوان</label>
                                                        <input dir="rtl" type="text" name="title"
                                                               class="form-control mb-2" id="inlineFormInput"
                                                               placeholder="العنوان">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="sr-only"
                                                               for="inlineFormInputGroup">التفاصيل</label>

                                                        <textarea dir="rtl" name="Description" class="form-control"
                                                                  id="exampleFormControlTextarea1"
                                                                  placeholder="التفاصيل"></textarea>

                                                    </div>
                                                </div>


                                                <br>
                                                <div class="col-lg-3">
                                                    <button type="submit" class="btn btn-primary mb-2">خزن</button>
                                                </div>

                                            </form>


                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>


                    </section><!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    عرض المعلومات الطبية
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="row">
                                        <div class="col-lg-12">


                                            <table id="example" class="display" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>العنوان</th>
                                                    <th>التفاصيل</th>
                                                    <th>النوع</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($Information as $Info )
                                                    <tr>
                                                        <td>{{$Info->title}}</td>
                                                        <td dir="rtl">
                                                            {{$Info->description}}


                                                        </td>
                                                        <td>{{$Info->type}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>العنوان</th>
                                                    <th>التفاصيل</th>
                                                    <th>النوع</th>
                                                </tr>
                                                </tfoot>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@extends('template.Footer')
@section('js')
    <script>
        $(document).ready(function () {


            $('#example  th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder=' + title + ' />');
            });
            //DataTable
            var table = $('#example').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every(function () {
                        var that = this;

                        $('input').on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });


        });
    </script>
@endsection

<!-- Page Content -->
