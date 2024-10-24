<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Đăng ký</title>
    <link rel="stylesheet" href="./dangnhap.css">
    <link rel="stylesheet" href="https://fontawesome.com/v5/icons/facebook-f?f=brands&s=solid">
</head>

<body>
    <div class="main">
        <div class="containerr" id="containerr">
            <div class="form-container sign-up-container">
                <form action="xulydangky.php" method="POST" name="myForm" onsubmit="return validateForm()">
                    <h2 class="title">Tạo tài khoản</h2>
                    <input type="text" name="ten" class="input" placeholder="Họ và tên" />
                    <input type="text" name="sdt" class="input"  placeholder="Số điện thoại" />
                    <input type="text" name="diachicuthe" class="input"  placeholder="Địa chỉ cụ thể" />
                    <input type="email" name="email" class="input"  placeholder="Email" />
                    <input type="text" name="tendangnhap" class="input"  placeholder="Tên đăng nhập" />
                    <input type="password" name="matkhau" class="input"  placeholder="Mật khẩu" />
                    <input type="password" name="xnmatkhau" class="input"  placeholder="Xác nhận mật khẩu" />
                    <input class="button_submit" type="submit" class="input"  id="btn" name="btnSavedk" value="ĐĂNG KÝ">
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="xulydangnhap.php" method="POST">
                    <h2 class="title">Đăng nhập</h2>
                    <div>
                        <label class="label">UserName: </label>
                        <input type="text" name="username"  id="username" class="input" placeholder="John" required />
                    </div>

                    <div>
                        <label for="password" class="label">Password: </label>
                        <input type="password" name="password"  id="password" class="input" placeholder="*********" required />
                    </div>

                    <input class="button_submit" type="submit" id="btn" name="login" value="ĐĂNG NHẬP">
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h2>Chào mừng trở lại!</h2>
                        <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                        <button class="ghost" id="signIn">Đăng nhập</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h2>Chào bạn!</h2>
                        <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình mua sách với chúng tôi</p>
                        <button class="ghost" id="signUp">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('containerr');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
    //   xử lý địa chỉ
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#city").change(() => {
        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let result = $("#city option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)
        }

    }
    // kiểm tra xác nhận mật khẩu
    const password = document.getElementsByName('matkhau')[0];
    const confirmPassword = document.getElementsByName('xnmatkhau')[0];
    const submitBtn = document.getElementsByName('btnSavedk')[0];

    function validatePassword() {
        if (password.value != confirmPassword.value) {
            confirmPassword.setCustomValidity("Mật khẩu không khớp");
        } else {
            confirmPassword.setCustomValidity('');
        }
    }
    submitBtn.addEventListener('click', validatePassword);

    function validateForm() {
        var ten = document.forms["myForm"]["ten"].value;
        var sdt = document.forms["myForm"]["sdt"].value;
        var city = document.forms["myForm"]["city"].value;
        var district = document.forms["myForm"]["district"].value;
        var ward = document.forms["myForm"]["ward"].value;
        var diachicuthe = document.forms["myForm"]["diachicuthe"].value;
        var email = document.forms["myForm"]["email"].value;
        var tendangnhap = document.forms["myForm"]["tendangnhap"].value;
        var matkhau = document.forms["myForm"]["matkhau"].value;
        var xnmatkhau = document.forms["myForm"]["xnmatkhau"].value;

        if (ten == "") {
            alert("Bạn chưa điền Họ và tên.");
            return false;
        }
        if (sdt == "") {
            alert("Bạn chưa điền số điện thoại.");
            return false;
        }
        if (sdt <= "z" && sdt >= "a") {
            alert("Bạn phải nhập sang dạng số nguyên.");
            return false;
        }
        if (city == "") {
            alert("Bạn chưa điền tỉnh.");
            return false;
        }
        if (district == "") {
            alert("Bạn chưa điền huyện.");
            return false;
        }
        if (ward == "") {
            alert("Bạn chưa điền xã.");
            return false;
        }
        if (diachicuthe == "") {
            alert("Bạn chưa điền địa chỉ cụ thể.");
            return false;
        }
        if (email == "") {
            alert("Bạn chưa điền email");
            return false;
        }
        if (tendangnhap == "") {
            alert("Vui lòng nhập tên đăng nhập");
            return false;
        }
        if (matkhau == "") {
            alert("Bạn chưa điền xác mật khẩu.");
            return false;
        }
        if (xnmatkhau == "") {
            alert("Bạn chưa điền xác nhận mật khẩu.");
            return false;
        }
    }
</script>