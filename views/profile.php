<?php
/** @var $this \thecodeholic\phpmvc\View */

use thecodeholic\phpmvc\form\Form;

$this->title = 'Profile';
?>
<body>
<div class="container">
    <img src="https://via.placeholder.com/150" alt="Profile Picture">
    <h1>John Doe</h1>
    <h3>Web Developer</h3>
    <?php Form::begin('', 'post') ?>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" class="form-control">

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" class="form-control">
        <label for="jobTitle">Job title</label>
        <input type="text" name="jobTitle" id="jobTitle" class="form-control">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
        <label for="profileImage">Profile image</label>
        <input type="text" name="profileImage" id="profileImage" class="form-control">
        <label for="dob">Date of birth</label>
        <input type="text" name="dob" id="dob" class="form-control">
        <label for="phoneNumber">Phone number</label>
        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control">
        <button type="submit" name="submit">Save</button>
    </div>
    <?php Form::end() ?>
</div>
</body>