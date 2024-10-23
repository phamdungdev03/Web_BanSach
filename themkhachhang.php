<style>
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 500px;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #ddd;
}

input[type=text], input[type=password], input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<br><br>
   <a style = " text-decoration: none;" href="javascript:history.back()">&#8592; Quay lại</a>
   <br><br>
<form action="xulythemkhachhang.php" method="post">
<table>
  <tr>
    <th colspan="2">Đăng ký</th>
  </tr>
  <tr>
    <td>Họ và tên:</td>
    <td><input type="text" name="ten" placeholder="Họ và tên"></td>
  </tr>
  <tr>
    <td>Số điện thoại:</td>
    <td><input type="text" name="sdt" placeholder="Số điện thoại"></td>
  </tr>
  <tr>
    <td>Tỉnh thành:</td>
    <td>
      <select id="city" name="city">
        <option value="" name="city" selected>Chọn tỉnh thành</option>           
      </select>
    </td>
  </tr>
  <tr>
    <td>Quận huyện:</td>
    <td>
      <select id="district" name="district">
        <option value="" name="district" selected>Chọn quận huyện</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Phường xã:</td>
    <td>
      <select id="ward" name="ward">
        <option value="" name="ward" selected>Chọn phường xã</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Địa chỉ cụ thể:</td>
    <td><input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể"></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="email" name="email" placeholder="Email"></td>
  </tr>
  <tr>
    <td>Tên đăng nhập:</td>
    <td><input type="text" name="tendangnhap" placeholder="Tên đăng nhập"></td>
  </tr>
  <tr>
    <td>Mật khẩu:</td>
    <td><input type="password" name="matkhau" placeholder="Mật khẩu"></td>
  </tr>
  <tr>
    <td>Xác nhận mật khẩu:</td>
    <td><input type="password" name="xnmatkhau" placeholder="Xác nhận mật khẩu"></td>
  </tr>
  <tr>
    <td colspan="2"><input class="brcl" type="submit" id="btn" name="btnSavedk" value="Đăng ký"></td>
  </tr>
</table>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>

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
</script>