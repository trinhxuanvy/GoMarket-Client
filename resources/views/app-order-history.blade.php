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
  .ratings{
      margin-right:10px;
  }

  .ratings i{
      
      color:#cecece;
      font-size:32px;
  }

  .rating-color{
      color:#fbc634 !important;
  }

  .review-count{
      font-weight:400;
      margin-bottom:2px;
      font-size:24px !important;
  }

  .small-ratings i{
    color:#cecece;   
  }

  .review-stat{
      font-weight:300;
      font-size:18px;
      margin-bottom:2px;
  }
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
  .max-width-1000 {
      max-width: 1000px;
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
              Ngành hàng
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button">Rau củ quả</button></li>
              <li><button class="dropdown-item" type="button">Thực phẩm sống</button></li>
              <li><button class="dropdown-item" type="button">Thực phẩm khô, đồ hộp</button></li>
              <li><button class="dropdown-item" type="button">Trái Cây</button></li>
              <li><button class="dropdown-item" type="button">Mặt hàng gia vị</button></li>
              <li><button class="dropdown-item" type="button">Đồ sinh hoạt</button></li>
              <li><button class="dropdown-item" type="button">Nước uống</button></li>
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
              <div class="card card-span mb-3 shadow-lg">
                <div class="card-body py-0">
                  <div class="row justify-content-center">
                    <div class="table-responsive mt-3">
                      <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
                        <thead>
                          <tr>
                            <th style="min-width: 80px">Mã đơn hàng</th>
                            <th style="min-width: 200px">Ngày đặt hàng</th>
                            <th style="min-width: 200px">Tổng giá</th>
                            <th style="min-width: 200px">Tình trạng</th>
                            <th style="min-width: 200px"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($orderHistory as $order)
                              <td>{{$order["_id"]}}
                              </td>
                              <td>{{ $order["createdAt"] }}</td>
                              <td>{{ $order["total"] }}</td>
                              <td>
                                @if ( $order["olderStatus"] != "" )
                                {{$order["olderStatus"] }}
                                @else
                                {{ $order["status"] }}
                                @endif
                              </td>
                              <td>
                                <button class="btn btn-primary btn-sm btn-click-block btn-review" data-bs-toggle="modal" data-bs-target="#orderDetailModal" value="{{ $order["_id"] }}">
                                  <i class="material-icons">visibility</i></button>
                                <button class="btn btn-primary btn-sm btn-click-block btn-rating-star" data-bs-toggle="modal" data-bs-target="#ratingModal"  value="{{ $order["_id"] }}">
                                  <i class="material-icons">rate_review</i></button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
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


  <!-- Modal -->
  <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog max-width-1000">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderDetailModalLabel">Chi Tiết Đơn Hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive mt-3">
          <table id="tableData" class="table table-bordered table-hover table-fixed border-top">
            <thead>
              <tr>
                <th style="min-width: 80px"></th>
                <th style="min-width: 200px">Tên sản phẩm</th>
                <th style="min-width: 200px">Giá</th>
                <th style="min-width: 200px">Số lượng</th>
                <th style="min-width: 200px">Tổng giá</th>
              </tr>
            </thead>
            <tbody id="order-details">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ratingModalLabel">Đánh giá đơn hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center">
          <div class="ratings">
              <i class="material-icons rating-button">star</i>
              <i class="material-icons rating-button">star</i>
              <i class="material-icons rating-button">star</i>
              <i class="material-icons rating-button">star</i>
              <i class="material-icons rating-button">star</i>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <script src="{{ asset('resources/js/scripts.js') }}"></script>
  <script>
  
    $(document).ready(function () {

      var headers = {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }

      $('.btn-review').click(function (e) { 

          e.preventDefault();
          var item = this;
          $("#pageLoading").removeClass("d-none");
              $.ajax({
              type: "post",
              url: "{{ route('app-order-detail')}}",
              headers: headers,
              data: {id: `${$(this).val()}`},
              dataType: "json",
              success(res) {
                console.log(res);
                if (res?.msg) 
                {
                  var orderDetails = res.msg;
                  // $("#navbarNotificationCounter").html(response.msg.cartAmount);
                  console.log(res.msg);


                  var div = document.getElementById("order-details");
                  console.log(div)

                  var html = "";
                  for (var i=0;i<orderDetails.length;i++) 
                  {
                      html += `<tr>
                                  <td><img class="cart-img"  src="`+ orderDetails[i]["productImg"]+`">
                                  </td>
                                  <td>`+ orderDetails[i]["productName"] +`</td>
                                  <td>`+ orderDetails[i]["price"] +`</td>
                                  <td><input class="input-box form-control w-xl-50" type="number" value="`+ orderDetails[i]["amount"] +`"></td>
                                  <td>`+ orderDetails[i]["price"]*orderDetails[i]["amount"] +`</td>
                              </tr>`
                  }

                  div.innerHTML = html;

                }
            }
          })

      });

      $('.btn-rating-star').click(function (e) { 
        var star = 1;
        var rating = $(".rating-button")
        $(rating).removeClass('rating-color');
        for(let i = 0; i < 5; i++)
        {
          $(rating[i]).click(function (e) { 
            console.log(i+1)
            star = i +1;
            for(let j = 0; j < 5; j++)
            {
              if (j <= i)
              {
                $(rating[j]).addClass('rating-color');
              }
              else
              {
                $(rating[j]).removeClass('rating-color');
              }
            }
          });
        }
        e.preventDefault();
        var item = this;
        $("#pageLoading").removeClass("d-none");
            $.ajax({
            type: "put",
            url: "{{ route('app-order-rating')}}",
            headers: headers,
            data: {id: `${$(this).val()}`, star: star},
            dataType: "json",
            success(res) {
              console.log(res);
              if (res?.msg) 
              {
                location.reload();  
              }
          }
        })

      });
    })

  </script>
</body>

</html>
