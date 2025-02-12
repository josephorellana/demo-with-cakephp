<?php
use Cake\Core\Configure;
?>

<div class="login-container">
    <h4 class="text-center mb-4">Iniciar Sesión</h4>
    <?php $this->Form->setTemplates(Configure::read('templates.form')); ?>
    <?= $this->Form->create(null, ['url' => '/Auth/login']) ?>

        <?= $this->Form->control('email', ['label' => 'Correo Electrónico', 'class' => 'form-control']) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña', 'type' => 'password', 'class' => 'form-control']) ?>
        <?= $this->Form->button('Ingresar', ['class' => 'btn btn-primary w-100']) ?>

    <?= $this->Form->end() ?>
</div>