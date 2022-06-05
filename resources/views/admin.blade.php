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
          <li><a class="dropdown-item" href="#!">Thay đổi thông tin</a></li>
          <li><a class="dropdown-item" href="#!">Tình trạng hoạt động</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="{{ route("admin-logout") }}">Đăng xuất</a></li>
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
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
              aria-expanded="false">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Danh sách cửa hàng
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
              aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Chức năng
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                  aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Thêm cửa hàng
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Quản lý người dùng</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
              aria-expanded="false" aria-controls="collapseUsers">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Danh sách người dùng
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUsers" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                  aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Khách hàng
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                  aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Admin
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
              </nav>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main class="p-4 ">
        <div class="p-sm-5 p-3 shadow rounded">
          <div class="d-flex justify-content-end">
            <form action="<?php echo route('storeList') ?>" method="get" class="me-2">
              <div class="input-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Tên, chủ cửa hàng ..."
                  aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center" type="submit"
                  id="button-addon2"><span class="material-icons">
                    search
                  </span></button>
              </div>
            </form>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <button type="button" class="btn btn-success d-flex align-item-center justify-content-center"><span
                  class="material-icons">
                  add
                </span>Thêm</button>
            </div>
          </div>
          <div class="table-responsive mt-3">
            <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
              <thead>
                <tr>
                  <th style="min-width: 250px">Tên cửa hàng</th>
                  <th style="min-width: 200px">Tình trạng</th>
                  <th style="min-width: 200px">Chặn</th>
                  <th style="min-width: 200px">Chủ cửa hàng</th>
                  <th style="min-width: 500px">Địa chỉ</th>
                  <th style="min-width: 150px">Mã số thuế</th>
                  <th style="min-width: 250px">Chứng nhận an toàn thực phẩm</th>
                  <th style="min-width: 250px">Chứng nhận kinh doanh</th>
                  <th style="min-width: 200px">Ngày đăng ký</th>
                  <th style="min-width: 80px">Cài đặt</th>
                </tr>
              </thead>
              <tbody>
                @foreach($stores as $store)
                <?php $item = json_decode(json_encode($store),TRUE); ?>
                <tr class='@if ($item["status"] === 0) disable @else @endif'>
                  <td>{{ $item["storeName"] }}</td>
                  <td class="status">
                    @if ($item["status"] === 0)
                    Chưa xác nhận
                    @else
                    Đã xác nhận
                    @endif
                  </td>
                  <td class="block">
                    @if ($item["disable"] === true)
                    Đã chặn
                    @endif
                  </td>
                  <td>{{ $item["ownerName"] }}</td>
                  <td>{{ $item["ward"] }}, {{ $item["district"] }}, {{ $item["province"] }}, {{ $item["address"] }}</td>
                  <td>{{ $item["tax"] }}</td>
                  <td><div class="custom-image" style="background-image: url('{{ $item["certification"] }}')"></div></td>
                  <td><div class="custom-image" style="background-image: url('{{ $item["businessLicense"] }}')"></div></td>
                  <td>{{ Carbon\Carbon::parse($item["createdAt"])->format('d/m/Y') }}</td>
                  <td>
                    <div class=" d-flex align-items-center justify-content-center"><button title="Xác nhận đăng ký" value="{{ $item["_id"] }}"
                        class="btn btn-success btn-sm d-flex align-items-center justify-content-center btn-click-check"><i
                          class="material-icons fs-6">check_circle</i></button>
                      <button title="Chặn cửa hàng" value="{{ $item["_id"] }}"
                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center ms-2 btn-click-block"><i
                          class="material-icons fs-6">lock</i></button>
                    </div>
                  </td>
                </tr>
                @endforeach
            </table>
          </div>
          <div class="d-flex justify-content-end mt-3">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item">
                    <a class="page-link <?php if ($prevPage === 'javascript:void(0)') echo 'btn disabled'; ?>" href="{{ $prevPage }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 0; $i < 5; $i++)
                    @if ($i + $currentPage <= $pageNo)
                        <li class="page-item">
                        <a class="page-link" href="{{ $paginationUrls[$i]["url"] }}">
                            {{ $paginationUrls[$i]["page"]}}
                        </a>
                    </li>
                    @endif

                @endfor
                <li class="page-item">
                    <a class="page-link <?php if ($nextPage === 'javascript:void(0)') echo 'btn disabled'; ?>" href="{{ $nextPage }}" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
              </ul>
            </nav>
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
      ordering: true,
      order: [[9, "asc"]],
      language: {
        info: "Số dòng: _TOTAL_",
        emptyTable: "<img src='{{ asset('resources/images/no-data.gif') }}' style='width: 300px' />"
      }
    });

    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    $(".btn-click-check").click(function (e) {
        e.preventDefault();
        var item = this;
        $("#pageLoading").removeClass("d-none");
        $.ajax({
            type: "post",
            url: "./store/verifyStore",
            headers: headers,
            data: {id: `${$(this).val()}`},
            dataType: "json",
            success: function (response) {
                $("#pageLoading").addClass("d-none");
                if (response?.msg?._id) {
                    const tr = $(item).parents('tr');
                    $(tr).removeClass("disable");
                    $(tr).find("td.status").html("Đã xác nhận");
                }
            }
        });
    });

    $(".btn-click-block").click(function (e) {
        e.preventDefault();
        var item = this;
        $("#pageLoading").removeClass("d-none");
            $.ajax({
            type: "post",
            url: "./store/blockStore",
            headers: headers,
            data: {id: `${$(this).val()}`},
            dataType: "json",
            success: function (response) {
                $("#pageLoading").addClass("d-none");
                if (response?.msg?._id) {
                    const tr = $(item).parents('tr');
                    $(tr).find("td.block").html(!response?.msg?.disable ? 'Đã chặn' : '');
                }
            }
        });
    });
  });
  </script>
</body>

</html>
