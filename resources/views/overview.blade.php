<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url("customer/overview.css")}}">
    <title>Khách hàng</title>
</head>
<body>
<div id = "container">


    <div>
        <form action="{{route('search')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Tên khách hàng">
            <input type="text" name="phoneNumber" placeholder="Số điện thoại">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <div style="margin: 10px">
        <a href="/customers/create">Thêm khách hàng</a>
    </div>
    <div>
        <?php $i = 0; ?>
        @if(isset($data))
            <table>
                <tr style="height:60px">
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                </tr>
                @foreach ($data as $d)
                    <?php $i++; ?>
                    <tr>
                        <td style="width: 5%">{{$i}}</td>
                        <td style="width: 30%">
                            <img class="image" src="{{url($d->getAvatar())}}" alt="">
                        </td>
                        <td style="width: 20%">
                            <p>{{$d->getFullName()}}</p>
                        </td>
                        <td style="width: 10%">

                            @if($d->getGender() == 1)
                                <p>Nam</p>
                            @elseif($d->getGender() == 0)
                                <p>Nữ</p>
                            @else
                                <p>Không xác định</p>
                            @endif

                        </td>
                        <td style="width: 20%">
                            <p>{{$d->getPhoneNumber()}}</p>
                        </td>
                        <td style="width: 25%">
                            {{$d->getEmail()}}
                        </td>

                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
</body>
</html>
