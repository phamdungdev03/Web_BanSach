<style>
  .form-container {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }

  .form-table {
    border-collapse: collapse;
    width: 100%;
  }

  .form-table th {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    font-size: 20px;
    padding: 15px;
    border-radius: 8px 8px 0 0;
  }

  .form-table th,
  .form-table td {
    padding: 10px;
  }

  .form-input,
  .form-select {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s, box-shadow 0.3s;
  }

  .form-input:focus,
  .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
  }

  .form-button {
    background-color: #007bff;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
    margin-top: 10px;
  }

  .form-button:hover {
    background-color: #0056b3;
  }

  .back-link {
    text-decoration: none;
    display: inline-block;
    margin-bottom: 20px;
    color: #007bff;
    transition: color 0.3s;
  }

  .back-link:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  .error-message {
    color: red;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 10px;
  }
</style>

<a class="back-link" href="javascript:history.back()">&#8592; Quay lại</a>

<div class="form-container">
  <form id="registerForm" action="xulythemkhachhang.php" method="post" onsubmit="return validateForm()">
    <table class="form-table">
      <tr>
        <td>Họ và tên:</td>
        <td>
          <input type="text" name="ten" id="ten" placeholder="Họ và tên" class="form-input">
          <span id="tenError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Số điện thoại:</td>
        <td>
          <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại" class="form-input">
          <span id="sdtError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Địa chỉ cụ thể:</td>
        <td>
          <input type="text" name="diachicuthe" id="diachicuthe" placeholder="Địa chỉ cụ thể" class="form-input">
          <span id="diachicutheError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td>
          <input type="email" name="email" id="email" placeholder="Email" class="form-input">
          <span id="emailError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Tên đăng nhập:</td>
        <td>
          <input type="text" name="tendangnhap" id="tendangnhap" placeholder="Tên đăng nhập" class="form-input">
          <span id="tendangnhapError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Mật khẩu:</td>
        <td>
          <input type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu" class="form-input">
          <span id="matkhauError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td>Xác nhận mật khẩu:</td>
        <td>
          <input type="password" name="xnmatkhau" id="xnmatkhau" placeholder="Xác nhận mật khẩu" class="form-input">
          <span id="xnmatkhauError" class="error-message"></span>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input class="form-button" type="submit" value="Thêm mới">
        </td>
      </tr>
    </table>
  </form>
</div>

<script>
  function validateForm() {
    let isValid = true;

    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

    const ten = document.getElementById('ten').value.trim();
    const sdt = document.getElementById('sdt').value.trim();
    const diachicuthe = document.getElementById('diachicuthe').value.trim();
    const email = document.getElementById('email').value.trim();
    const tendangnhap = document.getElementById('tendangnhap').value.trim();
    const matkhau = document.getElementById('matkhau').value.trim();
    const xnmatkhau = document.getElementById('xnmatkhau').value.trim();

    if (ten === '') {
      document.getElementById('tenError').textContent = 'Vui lòng nhập họ và tên.';
      isValid = false;
    }

    const phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(sdt)) {
      document.getElementById('sdtError').textContent = 'Số điện thoại phải có 10 chữ số.';
      isValid = false;
    }

    if (diachicuthe === '') {
      document.getElementById('diachicutheError').textContent = 'Vui lòng nhập địa chỉ cụ thể.';
      isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      document.getElementById('emailError').textContent = 'Email không hợp lệ.';
      isValid = false;
    }

    if (tendangnhap === '') {
      document.getElementById('tendangnhapError').textContent = 'Vui lòng nhập tên đăng nhập.';
      isValid = false;
    }

    if (matkhau.length < 6) {
      document.getElementById('matkhauError').textContent = 'Mật khẩu phải có ít nhất 6 ký tự.';
      isValid = false;
    }

    if (matkhau !== xnmatkhau) {
      document.getElementById('xnmatkhauError').textContent = 'Mật khẩu xác nhận không khớp.';
      isValid = false;
    }

    return isValid;
  }
</script>
