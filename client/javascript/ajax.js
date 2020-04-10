$(document).ready(function(){
 $('.comment-form').on('submit', function(event){
  event.preventDefault();
  var commentContent = $(this).find('.commentContent').val();
  commentContent = jQuery.trim(commentContent);
  var blogId = $(this).find(('.blogId')).html();
  if(commentContent==''){alert("empty field");
   $(this).find(('.commentContent')).css('border-color', 'red');
  }
  else{
    $('.commentContent').css('border-color', '#DCDCDC');
  $.ajax({
   url:"include/insertComments.php",
   method:"POST",
   data: {commentContent: "" + commentContent, blogId: "" + blogId},
   async: false,
   cache: false,
   success:function(data){
     $(this).find(".nocomments" ).remove();
     load_comment();
   },
   error: function(data){
    alert('failure');
  }
 });
}
 });
 function load_comment()
 {
    console.log( $('.blogId').length);
  for(var i=0;i < $('.blogId').length;i++){
    $('.output').eq(i).empty();
    var content = $('.blogId').eq(i).html();
     var userId = content.split('-')[1]; 
    var blogId = content.split('-')[0]; 
    console.log(content);
    console.log(userId);
    console.log(blogId);
   console.log("loading");
  $.ajax({
   url:"include/getComments.php",
   method:"POST",
   data: {blogId: blogId, userId: userId},
   async: false,
   cache: false,
   success:function(data)
   {
    $('.output').eq(i).append(data);
   },
   error: function(data){
    alert('failure to load');
  }
 });
 }
 }
 load_comment();
});
