var isDelivery = false;

function setDelivery(value)
{
    isDelivery = value;
    changeJS();
    changeHTML();
}

function changeHTML()
{
    if(isDelivery == false)
    {
        document.getElementById("tableNumDiv").innerHTML = '<form><input type="text" id="tableNum" placeholder="Do you have a table #?"></form>';
    }
    else
        document.getElementById("tableNumDiv").innerHTML = '';
}

function changeJS()
{
    if(isDelivery == false)
    {
        document.getElementById("pickup").style.border = "5px solid green";
        document.getElementById("delivery").style.border = "none";
        document.getElementById("delivSubmit").style.marginTop = "2.5%";
    }
    else
    {
        document.getElementById("delivery").style.border = "5px solid green";
        document.getElementById("pickup").style.border = "none";
    }

}

function submitOrder()
{
    if(isDelivery == false)
    {
        var tableNum = document.getElementById("tableNum").value;
        window.location.replace("confirm_order.php?isDelivery=".concat(isDelivery).concat("&tableNum=".concat(tableNum)));
    }
    else
        window.location.replace("confirm_order.php?isDelivery=".concat(isDelivery));
}

