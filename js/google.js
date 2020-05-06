function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var email = profile.getEmail();
    var fullname = profile.getName();
    var id = profile.getId();
    document.getElementById("fullname").value = fullname;
    document.getElementById("fullname").value = fullname;
    document.getElementById("email").value = email;
    if (email!=null){
        submit();
    }
}
with(document.login){
}