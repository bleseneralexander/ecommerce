//Kiem tra passsword moi va password nhap lai
var username = document.getElementById("username").value;
function check_rePassword(){
    var password_new = document.getElementById("password_new").value;
    var repassword = document.getElementById("passwordAgain_new").value;
    var checked = true;

    if(password_new!=repassword){
        checked = false;
        alert('Password nhập lại không đúng');
        window.location.href="./index.php?page_layout=profile&username="+username;
    }
    return checked;   
}

//Kiem tra password cu voi password trong CSDL
function check_oldPassword(){
    var checked_db=true;
    var username = document.getElementById("username").value;
    var password_old = document.getElementById("password_old").value;


    //call AJAX
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./modules_client/profile/check_password.php?username="+username+"&pass="+password_old;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);

    //send
    ajax.send();
    
    //receive
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            if(response == "True"){
                checked_db = true;
            } else {
                checked_db = false;
                alert('Password cũ không đúng');
                window.location.href="./index.php?page_layout=profile&username="+username;
            }
        }
    }
    return checked_db;
}

function check() {
    //Gọi các hàm đã viết
    if((check_oldPassword()==true) && (check_rePassword()==true)){ 
        //============Còn Bug khi mat khau cu sai nhung 2 mat khau moi dung================
        
        var username = document.getElementById("username").value;
        var password_new = document.getElementById("password_new").value;
        // alert("Đã đổi mật khẩu thành công"+password_new);

        //call AJAX
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./modules_client/profile/modify_password.php?username="+username+"&newpass="+password_new;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
        
        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                if(response == "True"){
                    window.location.href="./index.php?page_layout=profile&username="+username;
                    alert("Đã đổi mật khẩu thành công");
                } else {
                    alert("Không thể đổi mật khẩu. Vui lòng thử lại sau!");
                }
            }
        }
    }
}