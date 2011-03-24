function checkEmpty(){
   var username  = document.getElementById('username');
   var password1 = document.getElementById('password1');
   var password2 = document.getElementById('password2');
   

   if(username.value.length != 0 && password1.value.length != 0 && password2.value.length !=0 && password1.value == password2.value){
      alert("now ur good");
   }
}