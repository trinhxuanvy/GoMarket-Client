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
  <link href="{{ asset('resources/css/theme.css') }}" rel="stylesheet">
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

  .pt-50 {
    padding-top: 50px;
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

  .shadow-2 {
    box-shadow: 1px 4px 16px rgb(0 0 0 / 8%);
  }

  .border-radius-16 {
      border-radius: 16px;
  }

  .max-width-350 {
      max-width: 350px;
  }

  .item-center {
    position: sticky;
    top: 0;
    margin: 64px 0;
    left: 50%;
    transform: translateX(-50%);
  }

  .bg-login {
      background-image: url("https://cdn.pixabay.com/photo/2017/10/09/19/29/eat-2834549_960_720.jpg");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
      height: 100vh;
  }

  .bottom-32 {
      bottom: 32px;
  }

  .right-32 {
      right: 32px;
  }
  </style>
</head>

<body>
	<main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand d-inline-flex" href="{{ route('app-home') }}"><img class="d-inline-block logo-brand" src="../../resources/images/logo.png" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">GoMarket</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <form>
          <div class="input-group-icon pe-2"><i class="fas fa-search input-box-icon text-primary"></i>
            <input class="form-control border-0 input-box bg-100" type="search" placeholder="Search Food" aria-label="Search" />
          </div>
        </form>
        <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
          <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              Ngành hàng
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button">Rau củ quả</button></li>
              <li><button class="dropdown-item" type="button">Thực phẩm sống</button></li>
              <li><button class="dropdown-item" type="button">Trái Cây</button></li>
              <li><button class="dropdown-item" type="button">Mặt hàng gia vị</button></li>
              <li><button class="dropdown-item" type="button">Đồ sinh hoạt</button></li>
              <li><button class="dropdown-item" type="button">Nước uống</button></li>
            </ul>
            <button class="btn btn-primary">Cửa hàng</button>
          </div>
          <button class="btn btn-primary badge-notification badge rounded-pill">
            <span class="material-icons">shopping_cart</span>
          </button>
          <span id="navbarNotificationCounter" class="badge rounded-pill badge-notification bg-danger" alt="Notifications" style="color: rgb(255, 255, 255) !important;">2</span>
          <button class="btn btn-white shadow-warning text-warning" type="submit"> <i class="fas fa-user me-2"></i>Login</button>
        </div>
      </div>
    </nav>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
      <section class="py-4 pt-5">

        <div class="container">
          <div class="row">
            <div class="col-12 pt-50">
              <div class="card card-span mb-3 shadow-lg">
                <div class="card-body py-0">
                  <div class="row justify-content-center">
                    <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0">
                      <img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="../../resources/images/logo.png" alt="..." />
                    </div>
                    <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                      <div class="">
                      <h2 class="text-center mt-3">Đăng ký tài khoản</h2>
                        <form action="{{ route('app-register') }}" method="post" class="mt-3">
                            @csrf
                            <div class="p-3 bg-white border-radius-16">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" name="email" type="email" id="email" required>
                                </div>
                                <div class="mb-3">
                                  <label for="password" class="form-label">Mật khẩu</label>
                                  <input class="form-control" name="password" type="password" id="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prePassword" class="form-label">Nhập lại mật khẩu</label>
                                    <input class="form-control" type="password" id="prePassword" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success d-block mx-auto mt-3">Đăng ký</button>
                        </form>
                        <p class="text-center mt-5" style="font-size: 14px">Bạn đã có tài khoản? <a style="color:cadetblue"  href="{{ route('app-login') }}">Đăng nhập ngay</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
  
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

        @if (isset($message))
            <div class="alert alert-danger position-fixed bottom-32 right-32" role="alert">
            {{ $message }}
        </div>
        @endif
	</main>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <script src="{{ asset('resources/js/scripts.js') }}"></script>
</body>

</html>
