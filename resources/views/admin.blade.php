<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover table-fixed">
            <thead>
              <tr>
                <th>Cài đặt</th>
                <th style="min-width: 200px">Tên cửa hàng</th>
                <th style="min-width: 200px">Chủ cửa hàng</th>
                <th style="min-width: 500px">Địa chỉ</th>
                <th style="min-width: 200px">Mã số thuế</th>
                <th style="min-width: 200px">Chứng nhận an toàn thực phẩm</th>
                <th style="min-width: 200px">Chứng nhận kinh doanh</th>
                <th style="min-width: 200px">Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stores as $store)
              <?php $item = json_decode(json_encode($store),TRUE); ?>
              <tr>
                <th>
                  <div class=" d-flex align-items-center justify-content-center"><button title="Xác nhận đăng ký"
                      class="btn btn-success btn-sm d-flex align-items-center justify-content-center"><i
                        class="material-icons fs-6">check_circle</i></button>
                    <button title="Chặn cửa hàng"
                      class="btn btn-primary btn-sm d-flex align-items-center justify-content-center ms-2"><i
                        class="material-icons fs-6">lock</i></button>
                  </div>
                </th>
                <td>{{ $item["storeName"] }}</td>
                <td>{{ $item["ownerName"] }}</td>
                <td>{{ $item["ward"] }}, {{ $item["district"] }}, {{ $item["province"] }}, {{ $item["address"] }}</td>
                <td>{{ $item["tax"] }}</td>
                <td>{{ $item["certification"] }}</td>
                <td>{{ $item["businessLicense"] }}</td>
                <td>{{ $item["status"] }}</td>
              </tr>
              @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
  </script>
</body>


</html>