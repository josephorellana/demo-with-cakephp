<section class="mb-5 mt-3">
    <h1>Inicio</h1>
    <hr>
</section>

<?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
<h4>Indicadores</h4>

<div class="container mt-4 mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="indicator-card">
                <span class="indicator-number"><?= $totalStudents ?></span>
                <div class="indicator-text">
                    <span>Estudiantes activos</span>
                    <i class="bi bi-people indicator-icon"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="indicator-card">
                <span class="indicator-number"><?= $totalCourses ?></span>
                <div class="indicator-text">
                    <span>Cursos activos</span>
                    <i class="bi bi-book indicator-icon"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="indicator-card">
                <span class="indicator-number"><?= $totalEnrollments ?></span>
                <div class="indicator-text">
                    <span>Inscripciones realizadas</span>
                    <i class="bi bi-clipboard-check indicator-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<h4>Cursos Habilitados</h4>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach($courses as $course): ?>
            <div class="col">
                <div class="course-card">
                    <h5><?= $this->Html->link($course->name, ['controller' => 'Courses', 'action' => 'view', $course->id]) ?></h5>
                    <p><?= substr(h($course->description), 0, 50) . '...' ?></p>
                    <span class="badge bg-primary"><?= count($course->enrollments) ?> alumnos</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if( $authUser['role']['name'] === 'USER' ): ?>
<h4>Mis cursos</h4>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach($enrollments as $enrollment): ?>
            <div class="col">
                <div class="course-card">
                    <h5><?= $this->Html->link($enrollment->course->name, ['controller' => 'Courses', 'action' => 'view', $enrollment->course->id]) ?></h5>
                    <p><?= substr(h($enrollment->course->description), 0, 50) . '...' ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>