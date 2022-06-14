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
  .check-out-block {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
  }
  .title-store {
    margin: 10px;
  }
  .left-260 {
    transform: translateX(260px);
  }

  .cart-img {
    width: 80px;
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
      <div class="container"><a class="navbar-brand d-inline-flex" href="{{ route('app-home') }}"><img class="d-inline-block logo-brand" src="{{ asset('resources/images/logo.png') }}" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">GoMarket</span></a>
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
            @if ($cart)
              @if (count($cart) > 0)
              <span id="navbarNotificationCounter" class="badge rounded-pill badge-notification bg-danger" alt="Notifications" style="color: rgb(255, 255, 255) !important;">{{count($cart)}}</span>
              @endif
            @endif
            @if ($user)
            <ul class="navbar-nav ms-auto me-4 me-lg-4">
              <li class="nav-item dropdown">
                <button class="btn btn-primary dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"
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
            @else
            <a href="{{ route('app-login') }}" class="btn btn-white shadow-warning text-warning" type="button"> <i class="fas fa-user me-2"></i>Login</a>
            @endif
        </div>
      </div>
    </nav>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
      <section class="py-4 pt-5">

        <div class="container">
          <div class="row">
            <div class="col-12 pt-50">
              @foreach ($cartStore as $item )
              <div class="card card-span mb-3 shadow-lg">
                <h5 class="title-store">{{$item["storeName"]}}</h5>
                <div class="card-body py-0">
                  <div class="row justify-content-center">
                    <div class="table-responsive mt-3">
                      <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
                        <thead>
                          <tr>
                            <th style="min-width: 80px"></th>
                            <th style="min-width: 200px">Tên sản phẩm</th>
                            <th style="min-width: 200px">Giá</th>
                            <th style="min-width: 200px">Số lượng</th>
                            <th style="min-width: 200px">Tổng giá</th>
                            <th style="min-width: 60px"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cart as $cartdetail)
                            @if ($cartdetail["storeId"] == $item["storeId"])

                              <td><img class="cart-img"  src="{{$cartdetail["productImg"]}}">
                              </td>
                              <td>{{ $cartdetail["productName"] }}</td>
                              <td>{{ $cartdetail["price"] }}</td>
                              <td><input class="input-box form-control w-xl-50" type="number" value="{{ $cartdetail["amount"] }}"></td>
                              <td>{{ $cartdetail["price"]*$cartdetail["amount"] }}</td>
                              <td>
                                <button class="btn btn-primary btn-sm btn-click-block" value="{{ $cartdetail["_id"] }}">
                                  <i class="material-icons">delete</i></button>
                              </td>
                            </tr>
                            @endif
                          @endforeach
                      </table>
                      <hr>
                        <div class="check-out-block">
                          <a class="btn btn-primary" href="{{ "./checkout/".$item["storeId"] }}">Thanh toán</a>
                          <span style="width: 20px"></span>
                          <div>
                            <div>
                              Phí ship
                              <span>100000</span>
                            </div>
                            <div>
                              Tổng giá
                              <span>100000</span>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
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
