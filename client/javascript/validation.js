console.log("start sign")
document.addEventListener("DOMContentLoaded", function(event) {
  console.log("doc ready")
  function signin(){
    if(validateSignIn()){
    document.getElementById('l').click();
    }else{
      alert("Fill in the all the fields");
    }
    // $.ajax({
    //   url:"validateLogin.php",
    //   method:"POST",
    //   data: {Fname: fname, Lname: lname, userid: userName, userEmail: userEmail, userpwd: pwd, re_userpwd: repwd, birthday: birthday},
    //   async: false,
    //   cache: false,
    //   success:function(data){
    
    //   },
    //   error: function(data){
    //    alert('failure');
    //  }
    // });
  }
  
  function signup(){

    //e.preventDefault();
    if (validateSignUp()){
      var fname = document.forms["signup"]["Fname"].value;
      var lname = document.forms["signup"]["Lname"].value;
      var userName = document.forms["signup"]["userid"].value;
      var userEmail = document.forms["signup"]["useremail"].value;
      var pwd = document.forms["signup"]["userpwd"].value;
      var birthday = document.forms["signup"]["birthday"].value;
      var repwd = document.forms["signup"]["re_userpwd"].value;
      console.log(lname)
      // $.ajax({
      //   url:"Createuser.php",
      //   method:"POST",
      //   data: {Fname: fname, Lname: lname, userid: userName, userEmail: userEmail, userpwd: pwd, re_userpwd: repwd, birthday: birthday},
      //   async: false,
      //   cache: false,
      //   success:function(data){
      
      //   },
      //   error: function(data){
      //    alert('failure');
      //  }
      // });
      
      document.getElementById("s").click();

      console.log("see ru")
    }else{
      alert("Fill in all the valid information");
      console.log("not working")
    }
  }
  function validateSignUp() {
    var valid = true;
    var fname = document.forms["signup"]["Fname"].value;
    if (fname == "" || fname.trim() == "") {
      document.forms["signup"]["Fname"].style.borderColor = "red";
      valid = false ;
    } else if (isNaN(fname) == false) {
      document.forms["signup"]["Fname"].style.borderColor = "red";
      document.getElementsByName('Fname')[0].value = '';
      document.getElementsByName('Fname')[0].placeholder = 'Please enter a valid name';
      valid = false ;
    }
    var lname = document.forms["signup"]["Lname"].value;
    if (lname == "" || lname.trim() == "") {
      document.forms["signup"]["Lname"].style.borderColor = "red";
      valid = false ;
    } else if (isNaN(lname) == false) {
      document.forms["signup"]["Lname"].style.borderColor = "red";
      document.getElementsByName('Lname')[0].value = '';
      document.getElementsByName('Lname')[0].placeholder = 'Please enter a valid name';
      valid = false ;
    }
  
    var userName = document.forms["signup"]["userid"].value;
    if (userName == "" || userName.trim() == "") {
      document.forms["signup"]["userid"].style.borderColor = "red";
      valid = false ;
    }
    var userEmail = document.forms["signup"]["useremail"].value;
    if (userEmail == "") {
      document.forms["signup"]["useremail"].style.borderColor = "red";
      valid = false ;
    }
  
    var pwd = document.forms["signup"]["userpwd"].value;
    if (pwd == "" || pwd.trim() == "") {
      document.forms["signup"]["userpwd"].style.borderColor = "red";
      valid = false ;
    } else if (pwd.length < 4) {
      document.forms["signup"]["userpwd"].style.borderColor = "red";
      document.getElementsByName('userpwd')[0].value = '';
      document.getElementsByName('userpwd')[0].placeholder = 'Password must be atleast length 4';
      valid = false ;
  
    }
    var repwd = document.forms["signup"]["re_userpwd"].value;
    if (repwd == "" || repwd.trim() == "") {
      document.forms["signup"]["re_userpwd"].style.borderColor = "red";
      valid = false ;
    } else if (repwd != pwd) {
      document.forms["signup"]["re_userpwd"].style.borderColor = "red";
      document.getElementsByName('re_userpwd')[0].value = '';
      document.getElementsByName('re_userpwd')[0].placeholder = 'Passwords did not match!';
      valid = false ;
  
    }
    if(valid == true)
    return true;
    else
    return false;
  }
  // Your code to run since DOM is loaded and ready
  var form = document.getElementById("submit_2");
function handleForm(event) {console.log("wokring");signup() } 
if(form){
  form.addEventListener('click', handleForm);
}
var signinform = document.getElementById("signin");
function handlesignin(event) {console.log("wokringlogin");signin() } 
signinform.addEventListener('click', handlesignin);

});


function validateSignIn() {
  console.log("here");
  var valid = true;
  var userid = document.forms["signinin"]["username"].value;
  var pass = document.forms["signinin"]["password"].value;
  if (userid == "" && pass == "") {
    valid = false;
  } else if (userid == "" || userid.trim() == "") {
    document.forms["signinin"]["username"].style.borderColor = "red";
    valid = false;
  } else if (pass == "" || pass.trim() == "") {
    document.forms["signinin"]["password"].style.borderColor = "red";
    valid = false;
  } else if (pass.length < 4) {
    document.forms["signinin"]["password"].style.backgroundColor = "red";
    alert("Invalid password");
    valid = false;
  }
  if(valid == true)
    return true;
  else
  return false;
  
}



function validateSearch() {
  var search = document.forms["header_search"]["searchbtn"].value;
  if (search == "" || search.trim() == "") {
    return false;
  }
  function validateAccount() {
    var fname = document.forms["edit_prof"]["Fname"].value;
    if (fname == "" || fname.trim() == "") {
      document.forms["edit_prof"]["Fname"].style.borderColor = "red";
      return false;
    } else if (isNaN(fname) == false) {
      document.forms["edit_prof"]["Fname"].style.borderColor = "red";
      document.getElementsByName('Fname')[0].value = '';
      document.getElementsByName('Fname')[0].placeholder = 'Please enter a valid name';
      return false
    }
    var lname = document.forms["edit_prof"]["Lname"].value;
    if (lname == "" || lname.trim() == "") {
      document.forms["signup"]["Lname"].style.borderColor = "red";
      return false;
    } else if (isNaN(lname) == false) {
      document.forms["edit_prof"]["Lname"].style.borderColor = "red";
      document.getElementsByName('Lname')[0].value = '';
      document.getElementsByName('Lname')[0].placeholder = 'Please enter a valid name';
      return false
    }
  
    var userName = document.forms["edit_prof"]["userid"].value;
    if (userName == "" || userName.trim() == "") {
      document.forms["edit_prof"]["userid"].style.borderColor = "red";
      return false;
    }
    var userEmail = document.forms["edit_prof"]["useremail"].value;
    if (userEmail == "") {
      document.forms["edit_prof"]["useremail"].style.borderColor = "red";
      return false;
    }
  
    var pwd = document.forms["edit_prof"]["olduserpwd"].value;
    if (pwd == "" || pwd.trim() == "") {
      document.forms["edit_prof"]["userpwd"].style.borderColor = "red";
      return false;
    } else if (pwd.length < 4) {
      document.forms["edit_prof"]["olduserpwd"].style.borderColor = "red";
      document.getElementsByName('olduserpwd')[0].value = '';
      document.getElementsByName('olduserpwd')[0].placeholder = 'Password must be atleast length 4';
      return false;
  
    }
    var repwd = document.forms["edit_prof"]["newuserpwd"].value;
    var confirempwd = document.forms["edit_prof"]["re_userpwd"].value;
    if (repwd == "" || repwd.trim() == "") {
      document.forms["edit_prof"]["newyserpwd"].style.borderColor = "red";
      return false;
    } else if (repwd != confirempwd) {
      document.forms["edit_prof"]["re_userpwd"].style.borderColor = "red";
      document.getElementsByName('re_userpwd')[0].value = '';
      document.getElementsByName('re_userpwd')[0].placeholder = 'Passwords did not match!';
      return false;
  
    }
  
  }
}