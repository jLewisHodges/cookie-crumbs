<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Create New Account';
$script = "create_account.js";
include('header.php');



?>
<div class="content">
    <h3 id="cAccountTitle">Create your Cookie Crumbs account</h2>
    <form method="post" id="cAccountForm" onsubmit="return validateForm(event)" action="php_scripts/addUser.php">
        <input type = "text"  placeholder = "First Name" id="fname" name = "fname" required>
        <input type = "text" placeholder = "Last Name" id="lname" name = "lname" required>
    <div id="emailAddress">
        <input type = "text" placeholder = "Email Address" onkeyup="validate_email(event)" id="email" name = "eaddr" required>
        <div id="emailCheck"></div>
    </div>
    <div id="pass">
        <input type = "password" placeholder = "Password" id="password" name = "password" onkeyup="compare_passwords(event)" required>
        <input type = "password" placeholder = "Confirm Password" id="cPassword" name = "confPassword" onkeyup="compare_passwords(event)" required>
        <div id="xPic" title="Passwords do not mention"></div>
    </div>
    <div id="email">
        <input type = "text" name = "address" id="address" placeholder="Stree Address" required>
    </div>
        <input type = "text" name = "apt" id="apt" placeholder="Suite, APT, UNIT">
        <input type = "text" name = "city" id="city" placeholder="City" required>
        <select name = "state" id="state" required>
            <option default="">State</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select>
        <input type = "text" name = "zip" id="zip" placeholder="Zip Code" required>
        <input type = "submit" value="Create Account" id="cAccountButton">
    </form>
</div>
<?php
include('footer.php');
?>