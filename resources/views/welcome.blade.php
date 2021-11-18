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




   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$NewOrder}}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
        <a href="{{url('/?type=1')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
            <h3><sup style="font-size: 20px">{{$DailySuccessOrders}}</sup></h3>

              <p>success Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/?type=4')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$DailyRejectedOrders}}</h3>

              <p>Rejected</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('/?type=2')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $GetPendingOrderOfMainLab }}</h3>

              <p>Pending Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('/?type=5')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
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
                  Current New Orders
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
                                                <th>OrderStatus</th>
                                                <th>CreatedAt</th>
                                                <th>SecLab</th>
                                                <th>MainLab</th>
                                                <th>price</th>
                                                <th>PatientCode</th>
                                                <th>DriverMan</th>
                                                <th>Action's</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($DailyOrders as $DailyOrder )
                                            <tr>
                                                <td>{{ $DailyOrder->OrderStatus }}</td>
                                                <td>{{ $DailyOrder->CreatedAt }}</td>
                                                <td>{{ $DailyOrder->SecLab }}</td>
                                                <td>{{ $DailyOrder->MainLab }}</td>
                                                <td>{{ $DailyOrder->price }}</td>
                                                <td>{{ $DailyOrder->PatientCode }}</td>
                                                <td>{{ $DailyOrder->DriverMan }}</td>
                                                <td>
                                                    <button class="btn btn-warring">
                                                    <i class="fas fa-map-pin OrdersOnline"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>OrderStatus</th>
                                                <th>CreatedAt</th>
                                                <th>SecLab</th>
                                                <th>MainLab</th>
                                                <th>price</th>
                                                <th>PatientCode</th>
                                                <th>DriverMan</th>
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
$(document).ready(function() {

    $('#example').DataTable();
    $('body').on('click','.OrdersOnline',function(){
            alert("# this is when i click");
    });




 var webSocket = new WebSocket('wss://labmirsal.herokuapp.com/api/websocket_endpoint');

webSocket.onerror = function(event) {
    onError(event)
};

webSocket.onopen = function(event) {
    onOpen(event)
};


webSocket.onmessage = function(event){


   console.log(event);

}





function onOpen(event) {

$('.OrdersOnline').addClass("text-danger");
}

function onError(event) {
    alert(event.data);
}

function start() {
    var text = "ss";

    webSocket.send(text);
    return false;
}

});
</script>
@endsection

    <!-- Page Content -->
