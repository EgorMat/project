  window.addEventListener("load", function(){
    let usersLinks = document.getElementsByClassName('userLink');
    for (let i=0; i<=usersLinks.length-1; i++){
    usersLinks[i].addEventListener("click", function(){
      $.ajax({
        type: "POST",
        url: "add_friend.php",
        data: { login: usersLinks[i].innerHTML }
}).done(function( msg ) {
  alert('Your friendship request has been sent')
  document.location.href = "profile.php"
});
    })
  }

  $('.acceptButton').click(function(e){
    $.ajax({
      type: "POST",
      url: "confirm_friend.php",
      data: { friendLogin: e.target.innerHTML }
}).done(function( msg ) {
document.location.href = "friends.php"
});
  })


  });
