<?php

use notas\src\core\form\Form;

$form = new Form();

?>

<h1> Register </h1>

<?php $form = Form::begin('',"post") ?>

<?php $form = Form::begin('', 'post') ?>
    <div class="row">
        <div class="col">
        <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
        <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>

    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

  <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
