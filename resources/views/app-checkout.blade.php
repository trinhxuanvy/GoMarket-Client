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
  .form-control {
    padding: 6px 0px;
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
  .logo-brand {
    width: 50px;
    height: 50px;
  }
  .icon-flex {
    display: flex;
  }
  .cart-group-icon {
    position: relative;
  }

  .cart-group-icon .cart-box-icon {
    position: absolute;
    top: 20%;
    left: 2rem;
    color: #EEEEEE;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
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
              Ng??nh h??ng
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button">Rau c??? qu???</button></li>
              <li><button class="dropdown-item" type="button">Th???c ph???m s???ng</button></li>
              <li><button class="dropdown-item" type="button">Th???c ph???m kh??, ????? h???p</button></li>
              <li><button class="dropdown-item" type="button">Tr??i C??y</button></li>
              <li><button class="dropdown-item" type="button">M???t h??ng gia v???</button></li>
              <li><button class="dropdown-item" type="button">????? sinh ho???t</button></li>
              <li><button class="dropdown-item" type="button">N?????c u???ng</button></li>
            </ul>
            {{-- <button class="btn btn-primary">      {{count($cart)}}  @foreach($cart as $cartDetail)
              <span>{{$cartDetail["productName"]}}</span>
              @endforeach</button> --}}
          </div>
          <div class="cart-group-icon">
            <a class="btn btn-primary badge-notification badge rounded-pill" type="button" href="{{ route('app-cart') }}">
              <span class="material-icons">shopping_cart</span>
            </a>
            @if ($cart)
              @if (count($cart) > 0)
              <span id="navbarNotificationCounter" class="cart-box-icon badge rounded-pill badge-notification bg-danger" alt="Notifications" style="color: rgb(255, 255, 255) !important;">{{$cartCount}}</span>
              @endif
            @endif
          </div>
          @if ($user)
          <ul class="navbar-nav ms-auto me-4 me-lg-4">
            <li class="nav-item dropdown">
              <button class="btn btn-primary dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">T??i kho???n</button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Thay ?????i th??ng tin</a></li>
                <li><a class="dropdown-item" href="#!">T??nh tr???ng ho???t ?????ng</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#!">????ng xu???t</a></li>
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
              <div class="card card-span mb-3 shadow-lg">
                <div class="card-body py-0">
                  <div class="row justify-content-center">
                    <form action="./createorder/{{$storeId}}" method="post" class="me-2">
                      @csrf
                      <div class="d-flex">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xx-6 col-xs-12">
                          <h5>Th??ng tin nh???n h??ng</h5>
                            <div class="row p-2 pb-4 border-radius-16 bg-opacity-10">
                                <div class="col-6 mt-2">
                                    <label for="name" class="col-form-label">T??n ng?????i nh???n</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="name" id="name" value="" required >
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                  <label for="tax" class="col-form-label">Email</label>
                                  <div class="">
                                      <input type="text" class="form-control" id="email" name="email" value="" required >
                                  </div>
                              </div>
                                <div class="col-6 mt-2">
                                    <label for="phone" class="col-form-label">S??? ??i???n tho???i</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="phone" name="phone" value="" required >
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="province" class="col-form-label">T???nh/Th??nh ph???</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="province" name="province" value="" required >
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="district" class="col-form-label">Qu???n/Huy???n</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="district" name="district" value="" required >
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="ward" class="col-form-label">X??/Th??? tr???n</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="ward" name="ward" value="" required >
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="address" class="col-form-label">?????a ch???</label>
                                    <div class="">
                                        <input type="text" class="form-control" id="address" name="address" value="" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xx-6 col-xs-12">
                          <h5>Th??ng tin ????n h??ng</h5>
                          <div class="row p-2 pb-4 border-radius-16 bg-opacity-10">
                            <div class="col-8">
                              <label for="storeName" class="col-form-label">T??n s???n ph???m</label>
                            </div>
                            <div class="col-4 mt-2">
                              <label for="tax" class="col-form-label">Gi??</label>
                            </div>
                            @foreach($cart as $cartdetail)
                            <div class="col-8">
                                <div class="">
                                  <img class="cart-img"  src="{{$cartdetail["productImg"]}}">
                                  {{ $cartdetail["productName"] }}
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div class="">
                                  {{ $cartdetail["price"]}}*{{$cartdetail["amount"] }}
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            <input type="text" name="subTotal" id="subTotal" value="{{$totalPrice}}" hidden>
                            <input type="text" name="total" id="total" value="{{$totalPrice + 30000}}" hidden>
                            <div class="col-8">
                              <label for="title" class="col-form-label">T???ng ti???n</label>
                            </div>
                            <div class="col-4">
                              <label for="totalPrice" class="col-form-label">{{$totalPrice}}</label>
                            </div>
                            <div class="col-8">
                              <label for="title" class="col-form-label">Ti???n ship</label>
                            </div>
                            <div class="col-4">
                              <label for="totalPrice" class="col-form-label">30000</label>
                            </div>
                            <div class="col-8">
                              <label for="title" class="col-form-label">Th??nh ti???n</label>
                            </div>
                            <div class="col-4">
                              <label for="totalPrice" class="col-form-label">{{$totalPrice + 30000}}</label>
                            </div>
                            <div class="col-8" id="{{$storeId}}" name="{{$storeId}}">
                            </div>
                            <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-sm"> Thanh to??n</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
