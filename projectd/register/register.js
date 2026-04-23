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
