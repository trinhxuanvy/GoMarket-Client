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
		<div class="position-relative bg-secondary bg-opacity-10 bg-login" style="height: 100vh; overflow-y: scroll;">
			<div class="border-radius-16 shadow-2 max-width-350 p-4 item-center bg-light" style="width: 350px;">
                <div class="">
                    <img src="{{ asset('resources/images/logo.png') }}" alt="Go Market Admin" class="d-block mx-auto" height="140" width="140">
                    <h2 class="text-center mt-3">Đăng nhập</h2>
                    <form action="{{ route('shipper-login') }}" method="post" class="mt-3">
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
                        </div>
                        <button type="submit" class="btn btn-success d-block mx-auto mt-3">Đăng nhập</button>
                    </form>
                    <p class="text-center mt-5" style="font-size: 14px">Bạn chưa có tài khoản? <a href="{{ route('shipper-register') }}">Đăng ký ngay</a></p>
                </div>
            </div>
		</div>

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
