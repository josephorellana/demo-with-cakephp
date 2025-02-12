<?php
use Cake\Core\Configure;
?>

<section class="mb-5 mt-3">
    <h1>Agregar usuario</h1>
    <hr>
</section>

<section>
    
    <?php $this->Form->setTemplates(Configure::read('templates.form')); ?>
    <?= $this->Form->create($user) ?>
    
    <?= $this->Form->control('name', [
        'label' => 'Nombre', 
        'class' => $user->getError('name') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('paternal_last_name', [
        'label' => 'Apellido paterno',
        'class' => $user->getError('paternal_last_name') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('maternal_last_name', [
        'label' => 'Apellido materno',
        'class' => $user->getError('maternal_last_name') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('email', [
        'label' => 'Correo electrónico', 
        'type' => 'email',
        'class' => $user->getError('email') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('password', [
        'label' => 'Contraseña',
        'class' => $user->getError('password') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('role_id', [
        'options' => $roles, 
        'empty' => 'Seleccione', 
        'label' => 'Rol',
        'class' => $user->getError('role_id') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('is_active', [
        'label' => 'Activo', 
        'type' => 'checkbox', 
        'class' => 'form-check-input',
        'checked'
        ]) ?>

    <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary']) ?>
    
    <?= $this->Form->end() ?>
</section>
