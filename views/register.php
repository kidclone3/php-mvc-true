<?php
/** @var $model \app\models\RegisterForm */
/** @var $this \thecodeholic\phpmvc\View */
use thecodeholic\phpmvc\form\Form;

$this->title = 'Register - Base Account';

?>
<?php $form = Form::begin('', 'post') ?>
<h1>Register</h1>
    <div class="auth-sub-title">
        Welcome. Create your account to start working.
    </div>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'username') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>