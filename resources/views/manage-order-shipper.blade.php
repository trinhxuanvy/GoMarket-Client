<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel=stylesheet>
  <link href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css" rel=stylesheet>
  <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
  <style>
  .left-260 {
    transform: translateX(260px);
  }

  .width-260 {
    min-width: 260px;
  }

  td {
    vertical-align: middle;
  }

  tr.disable {
    background-color: #cccccc !important;
    font-style: italic;
  }

  .dataTables_scroll {
    padding-top: 16px;
  }
  .logo-brand {
    width: 50px;
    height: 50px;
  }

  .dataTables_empty {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    border: none;
  }

  .custom-image {
      width: 50px;
      height: 50px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-color: #ffffff;
  }

  .shadow-2 {
    box-shadow: 1px 4px 16px rgb(0 0 0 / 8%);
  }

  .border-radius-16 {
      border-radius: 16px;
  }

  img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .no-image {
      width: 100%;
      border: 5px solid #ffffff;
      border-radius: 16px;
      height: 400px;
      background-image: url('{{ asset('resources/images/no-image.gif') }}');
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center;
      background-color: #ffffff;
  }

  .loader {
      height: 100%;
      width: 100%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 16px;
  }
  </style>
</head>

<body>
  <nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm">
    <a class="navbar-brand ps-3" href="index.html">
      <img src="{{ asset('resources/images/logo.png') }}" alt="Go Market Admin" class="logo-brand">
    </a>
    <!-- Sidebar Toggle-->
    <button
      class="btn btn-light btn-sm order-1 order-lg-0 me-4 me-lg-0 d-md-none d-flex align-items-center justify-content-center"
      id="sidebarToggle" href="#!"><span class="material-icons">
        menu
      </span></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-4 me-lg-4">
      <li class="nav-item dropdown">
        <button class="btn btn-secondary dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"
          aria-expanded="false">Tài khoản</button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{ route("shipper-logout") }}">Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav" class="shadow-sm">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Quản lý đơn hàng</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
              aria-expanded="false">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Danh sách đơn hàng
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main class="p-4 ">
        <div class="p-sm-5 p-3 shadow rounded">
          <div class="d-flex justify-content-between align-items-center">
            <h1>Danh sách đơn hàng</h1>
            <form action="<?php echo route('shipper-index') ?>" method="get" class="me-2">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Phương thức, trạng thái, ..."
                  aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center" type="submit"
                  id="button-addon2"><span class="material-icons">
                    search
                  </span></button>
              </div>
            </form>
          </div>
          <div class="table-responsive mt-5">
            <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
              <thead>
                <tr>
                  <th style="min-width: 300px">Tên khách hàng</th>
                  <th style="min-width: 100px">Trạng thái</th>
                  <th style="min-width: 300px">Quá trình</th>
                  <th style="min-width: 100px">Phương thức thanh toán</th>
                  <th style="min-width: 150px">Số điện thoại</th>
                  <th style="min-width: 400px">Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <?php $item = json_decode(json_encode($order),TRUE); ?>
                <tr>
                  <td>{{ $item["customerName"] }}</td>
                  <td class="status">
                    {{$item["status"]}}
                  </td>
                  <td class="status">
                    {{$item["olderStatus"]}}
                  </td>
                  <td>{{ $item["paymentMethod"] }}</td>
                  <td>
                  {{ $item["phone"] }}
                  </td>
                  <td>
                  <button value="{{ $item["_id"] }}" type="button" class='@if ($item["status"] !== "Open") disabled  @else @endif btnnhandon btn btn-primary' >Nhận đơn</button>
                  <button value="{{ $item["_id"] }}" type="button" class="@if ($item["status"] === "Completed" || $item["status"] === "Open" || $item["status"] === "Cancelled") disabled @else @endif btnnhandon btn btn-primary">Chuyển trạng thái</button>
                  <button value="{{ $item["_id"] }}" type="button" class="@if ($item["status"] === "Completed" || $item["status"] === "Cancelled") disabled @else @endif btnhuydon btn btn-danger">Hủy đơn</button>
                  </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
  <div id="pageLoading" class="position-fixed d-none top-0 left-0 d-flex align-items-center justify-content-center w-100 vh-100 bg-dark bg-opacity-25" style="z-index: 1000000">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only"></span>
      </div>
  </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <script src="{{ asset('resources/js/scripts.js') }}"></script>
  <script>
  $(document).ready(function() {
    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    $(".btnnhandon").click(function (e) {
          e.preventDefault();
          var item = this;
          $("#pageLoading").removeClass("d-none");
              $.ajax({
              type: "put",
              url: "./manage/updateOrder",
              headers: headers,
              data: {id: `${$(this).val()}`},
              dataType: "json",
              success(res) {
                location.reload();  
            }
          })
    })
    $(".btnhuydon").click(function (e) {
          e.preventDefault();
          var item = this;
          $("#pageLoading").removeClass("d-none");
              $.ajax({
              type: "put",
              url: "./manage/cancelOrder",
              headers: headers,
              data: {id: `${$(this).val()}`},
              dataType: "json",
              success(res) {
                location.reload();  
            }
          })
    })
  });
  
</script>
</body>

</html>
