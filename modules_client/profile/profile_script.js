function check() {
    //Gọi các hàm đã viết
    if(validate()==true){
        alert('Đăng ký thành công');
    }
}

function validate(){
    var flag = true;

    var password = document.getElementById("password_new").value;
    var repassword = document.getElementById("passwordAgain_new").value;

    if(password!=repassword){
        flag = false;
        alert('*Nhập lại Password không đúng');
    }

    
    return flag;
}

