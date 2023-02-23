<?php
/** @var $this \thecodeholic\phpmvc\View */

use app\models\UserDetails;
use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\form\Field;
use thecodeholic\phpmvc\form\Form;

$this->title = 'Profile';
$user = Application::$app->user;
$model = UserDetails::findOne(['username' => $user->username]);
?>
<header>
    <div class="group-left">
        <i class="fa-solid fa-arrow-left"></i>
        <div class="nav-group">
            <h2> <a class = "account">Account</a></h2>
            <h1> <?php echo $user->getDisplayName()."-".$user->getRole();?></h1>
        </div>
    </div>
    <button id="btn-open"> <i class="fa-solid fa-arrow-up"></i>Edit my account</button>
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
                <a class="column"><?php echo $user->getEmail()?></a>
                <a class="column"><?php echo $model->getPhoneNumber()?></a>
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

<div id="modal-container" class="">
    <div id="modal">
        <div class="modal-header">
            <h1>Edit personal profile</h1>
            <button id="btn-close"><i class="fa-solid fa-xmark"></i></button>
        </div>
    <div class="modal-body">
    <?php  $form = Form::begin('', 'post');?>
<!--        <label for="firstname">First Name</label>-->
<!--        <input type="text" name="firstname" id="firstname" class="form-control">-->
<!---->
<!--        <label for="lastname">Last Name</label>-->
<!--        <input type="text" name="lastname" id="lastname" class="form-control">-->
<!--        <label for="jobTitle">Job title</label>-->
<!--        <input type="text" name="jobTitle" id="jobTitle" class="form-control">-->
<!--        <label for="username">Username</label>-->
<!--        <a>--><?php //echo Application::$app->session->get('username')?><!--</a>-->
<!--        <label for="profileImage">Profile image</label>-->
<!--        <input type="text" name="profileImage" id="profileImage" class="form-control">-->
<!--        <label for="dob">Date of birth</label>-->
<!--        <input type="date" name="dob" id="dob" class="form-control">-->
<!--        <label for="phoneNumber">Phone number</label>-->
<!--        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">-->
<!--        <label for="address">Address</label>-->
<!--        <input type="text" name="address" id="address" class="form-control">-->

    <?php echo $form->field($model, 'firstname')?>
    <?php echo $form->field($model, 'lastname')?>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $user->getEmail()?>" class ="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $user->getDisplayName()?>" class ="form-control" readonly>
    </div>
    <?php echo $form->field($model, 'jobTitle')?>
    <?php echo $form->field($model, 'profileImage')?>
    <div class="form-group">
        <div class="col">
            <label for="profileImage">Profile Image</label>
            <label class = "sub-label" for="profileImage">Profile Image</label>
        </div>
        <input type="file" name="profileImage" class ="form-control" accept="image/*">
    </div>
    <?php echo $form->field($model, 'dob', Field::TYPE_DATE)?>
    <?php echo $form->field($model, 'phoneNumber')?>
    <?php echo $form->field($model, 'address')?>
    <div class="btn-group">
        <button type="reset" name="cancel" class="btn-cancel">Cancel</button>
        <button type="submit" name="submit" class="btn-update">Update</button>
    </div>
    <?php Form::end() ?>
    </div>
    </div>
</div>
<script>
    const btnOpen = document.getElementById('btn-open');
    const btnClose = document.getElementById('btn-close');
    const modalContainer = document.getElementById('modal-container');
    btnOpen.addEventListener('click', () => {
        modalContainer.classList.add('show');
    });
    btnClose.addEventListener('click', () => {
        modalContainer.classList.remove('show');
    });
</script>