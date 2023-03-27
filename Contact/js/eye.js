const passField = document.querySelector("#password");
const showBtn = document.querySelector(".eye i");
showBtn.onclick = (()=>{
  if(passField.type === "password"){
    passField.type = "text";
    showBtn.classList.add("hide-btn");
  }else{
    passField.type = "password";
    showBtn.classList.remove("hide-btn");
  }
});
