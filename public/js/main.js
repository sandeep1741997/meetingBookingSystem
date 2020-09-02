
// function validateform(){  
// var name=document.myform.name.value;  
// var password=document.myform.password.value;  
  
// if (email==null || email==""){  
//   document.write("Name can't be blank");  
//   return false;  
// }else if(password.length>6){  
//   alert("Password must be at least 6 characters long.");  
//   return false;  
//   }  
// }  

function val()
{
    var password=document.getElementById('Password1');
    if(password.length>3){
    alert('Password length must be greater than 3');
    }
    window.alert('Page successfully loaded');
    
}