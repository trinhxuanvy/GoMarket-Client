<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<?php $item = json_decode(json_encode($store),TRUE); ?>

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
          <li><a class="dropdown-item" href="#!">Thay đổi thông tin</a></li>
          <li><a class="dropdown-item" href="#!">Tình trạng hoạt động</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Đăng xuất</a></li>
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
        <div class="p-sm-5 p-3 shadow-2 border-radius-16">
            <form action="./{{ $item['_id'] }}" method="post" class="me-2">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="ps-2">
                            <div class="row p-2 pb-4 bg-secondary border-radius-16 bg-opacity-10">
                                <div class="col-12">
                                    <label for="storeName" class="col-form-label">Tên cửa hàng</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="storeName" id="storeName" value="{{ $item["storeName"] }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="ownerName" class="col-form-label">Chủ cửa hàng</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="ownerName" id="ownerName" value="{{ $item["ownerName"] }}" disabled>
                                    </div>
                                </div>
                                <div class="col-8 mt-2">
                                    <label for="tax" class="col-form-label">Tax</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="tax" name="tax" value="{{ $item["tax"] }}">
                                    </div>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="rating" class="col-form-label">Đánh giá</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="rating" name="rating" value="{{ $item["rating"] }}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="province" class="col-form-label">Tỉnh/Thành phố</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="province" name="province" value="{{ $item["province"] }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="district" class="col-form-label">Quận/Huyện</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="district" name="district" value="{{ $item["district"] }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="ward" class="col-form-label">Xã/Thị trấn</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="ward" name="ward" value="{{ $item["ward"] }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="address" class="col-form-label">Địa chỉ</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $item["address"] }}">
                                    </div>
                                </div>
                                <input type="text" name="certification" id="certificationId" value="{{ $item["certification"] }}" hidden>
                                <input type="text" name="businessLicense" id="businessLicenseId" value="{{ $item["businessLicense"] }}" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 ps-4">
                        <div class="row bg-secondary p-2 border-radius-16 bg-opacity-10 h-100">
                            <div class="col-6 py-3">
                                <h6>Chứng nhận an toàn thực phẩm</h6>
                                <div class="no-image position-relative mt-3" id="imageCer" @if ($item["certification"]) style="background-image: url('{{ $item["certification"] }}')" @endif>
                                    <div class="loader bg-opacity-10 bg-info d-none" id="loaderCer">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <div class="spinner-border text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btnCer" class="btn btn-success d-block m-auto mt-3">Chọn ảnh khác</button>
                                <input type="file" id="inputCer" accept="image/*" hidden>
                            </div>
                            <div class="col-6 py-3">
                                <h6>Chứng nhận kinh doanh</h6>
                                <div class="no-image position-relative mt-3" id="imageBus" @if ($item["businessLicense"]) style="background-image: url('{{ $item["businessLicense"] }}')" @endif>
                                    <div class="loader bg-opacity-10 bg-info d-none" id="loaderBus">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <div class="spinner-border text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btnBus" class="btn btn-success d-block m-auto mt-3">Chọn ảnh khác</button>
                                <input type="file" id="inputBus" accept="image/*" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary d-block m-auto mt-4 text-light" type="submit">Lưu thay đổi</button>
            </form>
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
      language: {
        info: "Số dòng: _TOTAL_",
        emptyTable: "<img src='{{ asset('resources/images/no-data.gif') }}' style='width: 300px' />"
      }
    });

    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    $("#btnCer").click(function (e) {
        e.preventDefault();
        $("#inputCer").click();
    });

    $("#btnBus").click(function (e) {
        e.preventDefault();
        $("#inputBus").click();
    });

    $("#inputCer").change(function (e) {
        e.preventDefault();
        $('#loaderCer').removeClass('d-none');
        const fileList = e.target.files;
        let fileContent = "";

        const fr = new FileReader();
        fr.addEventListener("load", function () {
            fileContent = fr.result;

            $.ajax({
                type: "post",
                url: "{{ route('uploadFile') }}",
                headers: headers,
                async: true,
                data: {
                    image: fileContent,
                    name: e.target.files[0].name,
                    type: e.target.files[0].type,
                    extension: e.target.files[0].name.split('.').pop()
                },
                dataType: 'json',
                success: function (response) {
                    $('#loaderCer').addClass('d-none');
                    if (response?.msg?.imageUrl) {
                        console.log(response?.msg?.imageUrl)
                        $('#imageCer').css('background-image', 'url(' + response?.msg?.imageUrl + ')');
                        $("#certificationId").val(response?.msg?.imageUrl);
                    }
                }
            })
        });

        fr.readAsDataURL(fileList[0]);
    });
    $("#inputBus").change(function (e) {
        e.preventDefault();
        $('#loaderBus').removeClass('d-none');
        const fileList = e.target.files;
        let fileContent = "";

        const fr = new FileReader();
        fr.addEventListener("load", function () {
            fileContent = fr.result;

            $.ajax({
                type: "post",
                url: "{{ route('uploadFile') }}",
                headers: headers,
                async: true,
                data: {
                    image: fileContent,
                    name: e.target.files[0].name,
                    type: e.target.files[0].type,
                    extension: e.target.files[0].name.split('.').pop()
                },
                dataType: 'json',
                success: function (response) {
                    $('#loaderBus').addClass('d-none');
                    if (response?.msg?.imageUrl) {
                        console.log(response?.msg?.imageUrl)
                        $('#imageBus').css('background-image', 'url(' + response?.msg?.imageUrl + ')');
                        $("#businessLicenseId").val(response?.msg?.imageUrl);
                    }
                }
            })
        });

        fr.readAsDataURL(fileList[0]);
        });
});
  </script>
</body>

</html>
