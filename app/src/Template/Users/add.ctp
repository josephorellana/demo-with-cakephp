<?php
use Cake\Core\Configure;
?>

<section>
    <h1>Agregar Usuario</h1>
</section>

<section>
    
    <?php $this->Form->setTemplates(Configure::read('templates.form')); ?>
    <?= $this->Form->create($user) ?>
    
    <?= $this->Form->control('name', ['label' => 'Nombre', 'id' => 'name']) ?>
    <?= $this->Form->control('paternal_last_name', ['label' => 'Apellido paterno']) ?>
    <?= $this->Form->control('maternal_last_name', ['label' => 'Apellido materno']) ?>
    <?= $this->Form->control('email', ['label' => 'Correo electrónico', 'type' => 'email']) ?>
    <?= $this->Form->control('password', ['label' => 'Contraseña']) ?>
    <?= $this->Form->control('role_id', ['options' => $roles, 'empty' => 'Seleccione', 'label' => 'Rol']) ?>
    <?= $this->Form->control('is_active', ['label' => 'Activo', 'type' => 'checkbox', 'class' => 'form-check-input', 'checked']) ?>

    <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary']) ?>
    
    <?= $this->Form->end() ?>
</section>
