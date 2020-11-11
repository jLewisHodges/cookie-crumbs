var isDelivery = false;

function setDelivery(value)
{
    isDelivery = value;
    changeJS();

}

function changeJS()
{
    if(isDelivery == false)
    {
        document.getElementById("pickup").style.border = "5px solid green";
        document.getElementById("delivery").style.border = "none";
    }
    else
    {
        document.getElementById("delivery").style.border = "5px solid green";
        document.getElementById("pickup").style.border = "none";
    }

}

function submitOrder()
{
    window.location.replace("confirm_order.php?isDelivery=".concat(isDelivery));
}

