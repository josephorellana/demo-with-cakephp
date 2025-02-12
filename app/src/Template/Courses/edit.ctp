<?php
use Cake\Core\Configure;
?>

<section class="mb-5 mt-3">
    <h1>Editar curso</h1>
    <hr>
</section>

<section>
    
    <?php $this->Form->setTemplates(Configure::read('templates.form')); ?>
    <?= $this->Form->create($course) ?>
    
    <?= $this->Form->control('name', [
        'label' => 'Nombre', 
        'class' => $course->getError('name') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('description', [
        'label' => 'Descripción',
        'class' => $course->getError('description') ? 'form-control is-invalid' : 'form-control',
        ]) ?>
    <?= $this->Form->control('start_date', [
        'label' => 'Fecha de inicio',
        'class' => $course->getError('start_date') ? 'form-control is-invalid' : 'form-control',
        'type' => 'date',
        'value' => (!empty($course->start_date)) ? date('Y-m-d', strtotime($course->start_date)) : '',
        ]) ?>
    <?= $this->Form->control('end_date', [
        'label' => 'Fecha de término',
        'class' => $course->getError('end_date') ? 'form-control is-invalid' : 'form-control',
        'type' => 'date',
        'value' => (!empty($course->start_date)) ? date('Y-m-d', strtotime($course->end_date)) : '',
        ]) ?>
    <?= $this->Form->control('is_enabled', [
        'label' => 'Habilitado', 
        'type' => 'checkbox', 
        'class' => 'form-check-input',
        'required' => false
        ]) ?>

    <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary']) ?>
    
    <?= $this->Form->end() ?>
</section>