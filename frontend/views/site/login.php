<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<section id="form"><!--form-->
    <div class="container">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-1">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => '/site/login']); ?>

                    <?= $form->field($login, 'email')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($login, 'password')->passwordInput() ?>

                    <?= $form->field($login, 'rememberMe')->checkbox() ?>
                    
                    <div class="form-group">
                        <?= Html::submitButton('Login', [
                            'class' => 'btn btn-primary', 
                            'name' => 'login-button',
                            'form' => 'login-form'
                            ]) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
            

            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>

            <div class="col-sm-4">
                <?php $form = ActiveForm::begin(['id' => 'form-signup', 'action' => '/site/sign-up']); ?>

                    <?= $form->field($signUp, 'username')->textInput() ?>

                    <?= $form->field($signUp, 'email') ?>

                    <?= $form->field($signUp, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', [
                            'class' => 'btn btn-primary', 
                            'name' => 'signup-button',
                            'form' => 'form-signup'
                            ]) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>

    </div>
</section><!--/form-->
