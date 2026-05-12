function my()
{
    var x = document.getElementById("pass");
    var y = document.getElementById("cpass");
    if(x.type == "password")
    {
        x.type = "text";
        y.type = "text";
    }
    else
    {
        y.type = "password";
        x.type = "password";
    }
}

function validate() {
  const pw1 = document.getElementById("pass").value;
  const pw2 = document.getElementById("cpass").value;

  if (pw1 != pw2) {
    alert("Passwords do not match!");
    return false;
  }
  return true;
}