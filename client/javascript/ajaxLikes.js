$(document).ready(function(){
  console.log("ready");
 //
//    console.log("like");
//    event.preventDefault();
$('.newlike').on('click', function(event){
  event.preventDefault();
  console.log("submitting like");
  console.log(this.id);
  //var commentContent = $(this).find('.commentContent').val();
 // commentContent = jQuery.trim(commentContent);
  //var blogId = $(this).find(('.blogId')).html();
   var content = (this.id);
   console.log(content);
     var userId = content.split('-')[1]; 
    var blogId = content.split('-')[0]; 
  $.ajax({
   url:"include/newLikePost.php",
   method:"POST",
   data: {blogId: "" + blogId, userId: userId},
   async: false,
   cache: false,
   success:function(data){
    // $(this).find(".nocomments" ).remove();
     load_likes();
   },
   error: function(data){
    alert('failure');
  }
 });

 });   
  

//  });
 function load_likes()
 {
  for(var i=0;i < $('.blogId').length;i++){
    $('.numOfLikes').eq(i).empty();
   var blogId = $('.blogId').eq(i).html().split('-')[0];
  $.ajax({
   url:"include/getLikes.php",
   method:"POST",
   data: {blogId: "" + blogId},
   async: false,
   cache: false,
   success:function(data)
   {
     console.log(data);
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
// function putLike (){
//   var blogId =$(this).attr("id");
//   $.ajax({
//    url:"include/newLikePost.php",
//    method:"POST",
//    data: {blogId: "" + blogId},
//    async: false,
//    cache: false,
//    success:function(data){
//      load_likes();
//    },
//    error: function(data){
//     alert('failure');
//   }
// });
// }
// function on() {
//   document.getElementById("overlay").style.display = "block";
// }

// function off() {
//   document.getElementById("overlay").style.display = "none";
// }