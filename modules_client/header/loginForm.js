const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});



//Kiem tra passsword moi va password nhap lai
function check_rePassword(){
  var password_new = document.getElementById("password_client").value;
  var repassword = document.getElementById("passwordAgain_client").value;
  var checked = true;

  if(password_new!=repassword){
      checked = false;
      alert('Password nhập lại không đúng. Thử lại!');
  }
  return checked;   
}

function check() {
  //Gọi các hàm đã viết
  if(check_rePassword()==true){
    var HoTenKH = document.getElementById("name_client").value;
    var SoDienThoai = document.getElementById("phoneNumber_client").value;
    var UserName = document.getElementById("username_client").value;
    var password = document.getElementById("password_client").value;
    // alert(password);

    //call AJAX
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./signin.php?HoTenKH="+HoTenKH+"&SoDienThoai="+SoDienThoai+"&UserName="+UserName+"&password="+password;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    //send
    ajax.send();
      
    //receive
    ajax.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var response = this.responseText;
        if(response == "True"){
          alert('Đăng ký thành công');
          window.location.href="./loginForm.php";
        } else {
          alert('Không thể đăng ký do tài khoản tồn tại. Vui Lòng thử lại');
        }  
      }
    }
  }
}