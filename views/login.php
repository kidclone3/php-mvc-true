<?php

/** @var $model \app\models\LoginForm */
/** @var $this \thecodeholic\phpmvc\View */

use thecodeholic\phpmvc\form\Form;
$this->title = 'Login - Base Account';
?>

<?php $form = Form::begin('', 'post') ?>
<h1>Login</h1>
<div class="auth-sub-title">
    Welcome back. Login to start working.
</div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <div class="submit" onclick="">Login to start working</div>
<div class="extra">
    <div class="simple">
        <a class="a" href="#">
            Login with Guest/Client access?
        </a>
    </div>
</div>

<?php Form::end() ?>
