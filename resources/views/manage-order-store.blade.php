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
          <li><a class="dropdown-item" href="{{ route("user-account") }}">Thay đổi thông tin</a></li>
          <li><a class="dropdown-item" href="#!">Tình trạng hoạt động</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="{{ route("user-logout") }}">Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav" class="shadow-sm">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Tổng quan</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Danh mục
            </a>
            <div class="sb-sidenav-menu-heading">Quản lý cửa hàng</div>
            <a class="nav-link collapsed" href="{{ route("allStore") }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Danh sách cửa hàng
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main class="p-4 ">
        <div class="p-sm-5 p-3 shadow rounded">
          <div class="table-responsive mt-3">
            <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
              <thead>
                <tr>
                  <th style="min-width: 200px">Mã đơn hàng</th>
                  <th style="min-width: 200px">Tên khách hàng</th>
                  <th style="min-width: 250px">Ngày đặt hàng</th>
                  <th style="min-width: 200px">Tình trạng đơn hàng</th>
                  <th style="min-width: 200px">Tổng giá tiền</th>
                  <th style="min-width: 200px">Chi tiết đơn hàng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <?php $item = json_decode(json_encode($order),TRUE); ?>
                <tr>
                  <td>{{ $item["_id"] }}</td>
                  <td>{{ $item["customerName"] }}
                  </td>
                  <td>{{ Carbon\Carbon::parse($item["createdAt"])->format('d/m/Y h:m:s') }}</td>
                  <td>
                    {{ $item["status"] }}
                  </td>
                  <td>{{ $item["total"] }}</td>
                  <td>
                    <button class="btn btn-success btn-sm btn-review" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="{{ $item['_id'] }}">Xem</button>
                  </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Chi tiết đơn hàng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                  </tr>
                </thead>
                <tbody id="tableDataList">
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
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
    $('#tableData').DataTable({
      scrollY: 350,
      scrollX: true,
      searching: false,
      paging: false,
      info: false,
      fixedColumns: {
        left: 1,
        right: 1
      },
      language: {
        info: "Số dòng: _TOTAL_",
        emptyTable: "<img src='{{ asset('resources/images/no-data.gif') }}' style='width: 300px' />"
      }
    });

    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    $(".btn-review").click(function (e) {
        e.preventDefault();
        $('#pageLoading').removeClass('d-none');
        var item = this
        $.ajax({
                type: "get",
                url: "{{ route('manage-order-detail') }}/" + $(item).val(),
                headers: headers,
                async: true,
                dataType: 'json',
                success: function (response) {
                    if (response?.msg?.status === 200) {
                        let dataStr = ''
                        response?.msg?.data?.orderDetails?.entities.forEach(o => {
                            dataStr += `<tr vertical-align="center">
                                            <td>${o.productName}</td>
                                            <td><img style="width:60px;height:60px"  src='${o.productImg}' /></td>
                                            <td>${o.amount}</td>
                                            <td>${o.price}</td>
                                        </tr>`
                        });
                        $("#tableDataList").html(dataStr);
                    }
                    $('#pageLoading').addClass('d-none');
                }
            })
    });
  });
  </script>
</body>

</html>
