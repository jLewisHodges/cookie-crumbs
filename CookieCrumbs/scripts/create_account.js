

function validateForm(e)
{
    
}

function compare_passwords(e)
{
    password = document.getElementById("password").value;
    confPassword = document.getElementById("cPassword").value;
    if(!(password == confPassword))
    {
        e.preventDefault();
        document.getElementById("cPassword").style.width="45%";
        document.getElementById("xPic").innerHTML = "<img id=\"passCheck\" src=\"images/open-x.png\" alt=\"alternative text\" title=\"Passwords do not match\"/>";
    }
    else
    {
        document.getElementById("cPassword").style.width="45%";
        document.getElementById("xPic").innerHTML = "<img id=\"passCheck\" src=\"images/open-checkmark.png\" title=\"Passwords match\"/>";
    }
}

function validate_email(e)
{
    email = document.getElementById("email").value;
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!pattern.test(email))
    {
        e.preventDefault();
        document.getElementById("email").style.width="95%";
        document.getElementById("emailCheck").innerHTML = "<img id=\"passCheck\" src=\"images/open-x.png\" title=\"Invalid email\">";
    }
    else
    {
        document.getElementById("email").style.width="92.7%";
        document.getElementById("emailCheck").innerHTML = "<img id=\"passCheck\" src=\"images/open-checkmark.png\" title=\"Valid email\">";
    }
}