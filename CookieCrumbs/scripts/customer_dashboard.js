function addInput()
{
    document.getElementById("orderInput").innerHTML = '<form method="post" action="view_order.php"><input type="text" name="orderNum" placeholder="Enter Order Number" id="orderNum"><button type="submit">Submit</button></form>';
    document.getElementById("singleOrderButton").style.height = '25%';
    document.getElementById("singleOrderButton").style.marginTop = '0';
    document.getElementById("singleOrderButton").style.fontSize = '15px';
}