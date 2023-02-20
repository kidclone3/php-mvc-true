<?php
/** @var $this \thecodeholic\phpmvc\View */

use app\models\UserDetails;
use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\form\Form;

$this->title = 'Profile';
$user = Application::$app->user;
$userDetails = UserDetails::findOne(['username' => $user->username]);
?>
<header>
    <input type="checkbox" id="check">
    <div class="group-left">
        <i class="fa-solid fa-arrow-left"></i>
        <div class="nav-group">
            <h2> <a class = "account">Account</a></h2>
            <h1> <?php echo $user->getDisplayName()."-".$user->getRole();?></h1>
        </div>
    </div>
    <button class="btn-edit"> <i class="fa-solid fa-arrow-up"></i>Edit my account</button>

</header>

<div class="box">
    <div class="avatar">
        <img src="https://via.placeholder.com/150" alt="Profile Picture">

    </div>
    <div class="info">
        <h1><?php echo $user->getDisplayName()?></h1>
        <h3>Owner</h3>
        <div class="info-box">
            <div class="left">
                <h4 class="column">Email address</h4>
                <h4 class="column">Phone number</h4>
                <h4 class="column">Direct managers</h4>
            </div>
            <div class="right">
                <a class="column"><?php echo $user->email?></a>
                <a class="column"><?php echo $userDetails->phoneNumber?></a>
                <a class="column"></a>
            </div>
        </div>
    </div>

<!--    <a>--><?php //var_dump($_SESSION);?><!-- </a>-->
</div>
<div class="contact">
    <h2>Contact info</h2>
    <div class="contact-info"></div>
    <h4>Address</h4>
</div>
<div class="container">
    <h1><?php echo Application::$app->user->getDisplayName() ?></h1>
    <?php Form::begin('', 'post') ?>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" class="form-control">

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" class="form-control">
        <label for="jobTitle">Job title</label>
        <input type="text" name="jobTitle" id="jobTitle" class="form-control">
        <label for="username">Username</label>
        <a><?php echo Application::$app->session->get('username')?></a>
        <label for="profileImage">Profile image</label>
        <input type="text" name="profileImage" id="profileImage" class="form-control">
        <label for="dob">Date of birth</label>
        <input type="date" name="dob" id="dob" class="form-control">
        <label for="phoneNumber">Phone number</label>
        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control">
        <button type="submit" name="submit">Save</button>
    </div>
    <?php Form::end() ?>

</div>
<script>
    $(document).ready(function () {
        $(".btn-edit").click(function () {
            $("#check").is(":checked") ? $("#check").prop("checked", false) : $("#check").prop("checked", true);
        });
    }

</script>