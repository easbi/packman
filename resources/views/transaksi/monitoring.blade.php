<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Packman | Monitoring</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Monitoring Paket</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $status1 }}<sup style="font-size: 20px">Paket</sup>                           
                  <p>Sudah Diterima Pemilik</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ action('TransaksiController@rekapstatus',3) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $status2 }}<sup style="font-size: 20px">Paket</sup></h3>
                  <p>Berada di Pos Satpam<p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ action('TransaksiController@rekapstatus',3) }}" class="small-box-footer">
                  More info 
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $status3 }}<sup style="font-size: 20px">Paket</sup></h3>
                  <p>Berada di Resepsionis<p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ action('TransaksiController@rekapstatus',2) }}" class="small-box-footer">
                  More info 
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $statust }}</h3>
                  <p>Total Paket</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url('/transaksis/show') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">US-Visitors Report</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>              
                <div class="card-body p-0">
                  <div class="d-md-flex">
                    <div class="p-1 flex-fill" style="overflow: hidden">
                      <!-- Map will be created here -->

                    </div>
                    <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                      <div class="description-block mb-4">
                        <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                        <h5 class="description-header">8390</h5>
                        <span class="description-text">Visits</span>
                      </div>
                      <!-- /.description-block -->
                      <div class="description-block mb-4">
                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                        <h5 class="description-header">30%</h5>
                        <span class="description-text">Referrals</span>
                      </div>
                      <!-- /.description-block -->
                      <div class="description-block">
                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                        <h5 class="description-header">70%</h5>
                        <span class="description-text">Organic</span>
                      </div>
                      <!-- /.description-block -->
                    </div><!-- /.card-pane-right -->
                  </div><!-- /.d-md-flex -->
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Inventory</span>
                  <span class="info-box-number">5,200</span>
                </div>
              </div>
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
                </div>
              </div>
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                </div>
              </div>
              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
      <script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <script>
      $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/sparklines/sparkline.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
      <script src="{{asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>
      <script src="{{asset('adminLTE/dist/js/pages/dashboard.js')}}"></script>
      <script src="{{asset('adminLTE/dist/js/demo.js')}}"></script>



    </body>
    </html>


