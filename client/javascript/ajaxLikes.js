$(document).ready(function(){
  console.log("ready");
 //
//    console.log("like");
//    event.preventDefault();
   
  

//  });
 function load_likes()
 {
  for(var i=0;i < $('.blogId').length;i++){
    $('.numOfLikes').eq(i).empty();
   var blogId = $('.blogIdlike').eq(i).html();
  $.ajax({
   url:"include/getLikes.php",
   method:"POST",
   data: {blogId: "" + blogId},
   async: false,
   cache: false,
   success:function(data)
   {
    $('.numOfLikes').eq(i).append(data);
   },
   error: function(data){
    alert('failure to load');
  }
 });
 }
 }
 load_likes();
});
function putLike (){
  var blogId =$(this).attr("id");
  $.ajax({
   url:"include/newLikePost.php",
   method:"POST",
   data: {blogId: "" + blogId},
   async: false,
   cache: false,
   success:function(data){
     load_likes();
   },
   error: function(data){
    alert('failure');
  }
 });
}
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}