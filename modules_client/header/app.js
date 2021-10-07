const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// function validate(){
//   var password = document.getElementById("password_client").value;
//   var repassword = document.getElementById("passwordAgain_client").value;

//   if(password!=repassword){
//     flag = false;
//     alert('*Nhập lại Password không đúng');
//   }
// }
