<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm khách hàng</title>
    <link rel="stylesheet" type="text/css" href="{{asset("customer/create.css")}}">
    <script type="text/javascript">
        function validate(){
            var name = document.getElementById("fullName");
            var phone = document.getElementById("phoneNumber");
            var email = document.getElementById("email");
           const checkPhone = /^[0-9]{9,12}$/;
            const checkEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var flag = 1;
            if(name == "" || name.length <= 0){
                flag =0;
            }
            if(email.length <=0){
                flag=0;
            }
            if(phone.length <=0){
                flag=0;
            }
            if(flag == 1){
                return true;
            }
            else{
                alert("Vui lòng nhập lại dữ liệu !");
                return false;
            }
        }
        function myfunc(){
            var a= document.getElementById('anh1');
            var b= document.getElementById('file');
            var url = URL.createObjectURL(b.files[0]);
            a.src=url;
        }
    </script>
</head>
<body>
    <div id="container">
        <form action="/customers/create" method="POST" onsubmit=" return validate()" enctype="multipart/form-data">
            @csrf
            <div id=" "image>
                <table>
                    <tr>
                        <td>
                            <input type="file" style="display: none" id="file" onchange=" myfunc() " name="avatar">
                            <div><label for="file">Chọn ảnh</label></div>
                        </td>
                        <td><img style="max-width: 200px; max-height: 200px" src="" id = "anh1" alt=""></td>
                    </tr>
                </table>
            </div>
            <div id = "form">
                <table>
                    <tr>
                        <td>Họ và tên</td>
                        <td><input type="text" name="fullName" id = "fullName"></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>Nam <input type="radio" name="gender" checked value="1"> / Nữ <input type="radio" name="gender" value="0"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input type="text" name="phoneNumber" id="phoneNumber"></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center">
                <button style="width: 100px; height: 50px; text-align: center; display: inline-block; margin: auto" type="submit">Thêm</button>
            </div>

        </form>
    </div>
</body>
</html>
