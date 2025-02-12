<section>
    <h1>Detalles de usuario</h1>
</section>

<section>
<h3><?= h($user->name) . ' ' . h($user->paternal_last_name) ?></h3>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="row">Nombre</th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row">Apellido paterno</th>
            <td><?= h($user->paternal_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row">Apellido materno</th>
            <td><?= h($user->maternal_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row">Correo electrónico</th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row">Rol</th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Usuario activo</th>
            <td><?= ($user->is_active) ? '<span class="badge text-bg-success">Activo</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
        </tr>
    </table>
    <hr>
    <div class="related">
        <h4>Cursos inscritos</h4>
        <div class="dropdown mb-3">
            <input type="text" id="course-search" class="form-control" placeholder="Inscribir en curso: Ingrese nombre del curso" autocomplete="off">
            <ul class="dropdown-menu w-100" id="course-search-result"></ul>
        </div>

        <div id="ajax-replace">
            <?= $this->element('Users/enrollments_table') ?>
        </div>
    </div>
</section>

<div class="toast align-items-center text-bg-success border-0 position-fixed bottom-0 end-0 p-2 mb-5 me-3" style="z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true" id="toast-message-enroll">
    <div class="d-flex">
        <div class="toast-body" id="toast-message-text-enroll">
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<script>
$(document).ready(function() {
    const csrfToken = $('meta[name="csrfToken"]').attr('content');

    $('#course-search').on('keyup', function() {
        const query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Courses', 'action' => 'searchCourse']) ?>",
                type: "GET",
                data: { search: query },
                dataType: "json",
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(data) {
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(function(course) {
                            html += `<li><div class="row"><div class="col"><a class="dropdown-item disabled" href="#">${course.name}</a></div><div class="col text-end"><button class="btn btn-sm btn-success enroll-user me-3" data-id="${course.id}"><i class="bi bi-plus"></i> Agregar</button></div></div></li>`;
                        });
                    } else {
                        html += '<li><a class="dropdown-item disabled" href="#">No se encontraron resultados</a></li>';
                    }
                    $('#course-search-result').html(html).addClass('show');
                },
                error: function(xhr, status, error) {
                    console.error("Error en AJAX:", status, error);
                },
            });
        } else {
            $('#course-search-result').html('').removeClass('show');
        }
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('#course-search-result').removeClass('show');
            $('#course-search').val('');
        }
    });

    $(document).on('click', '.enroll-user', function(e){
        const id = $(this).data('id');
        if( id ) {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Courses', 'action' => 'enroll']) ?>",
                type: "GET",
                data: {
                    userId: "<?= h($user->id) ?>",
                    courseId: id
                 },
                dataType: "json",
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(data) {
                    if( data ) {
                        let toast = $('#toast-message-enroll');
                        $('#toast-message-text-enroll').text(data.message);
                        toast.removeClass('text-bg-success');
                        toast.removeClass('text-bg-danger');
                        toast.addClass('text-bg-' + data.type);
                        toast = document.getElementById('toast-message-enroll');
                        if (toast) {
                            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
                            toastBootstrap.show();
                        }
                        $('#course-search-result').removeClass('show');
                        $('#course-search').val('');
                        $.ajax({
                            url: "<?= $this->Url->build(['controller' => 'Users', 'action' => 'getEnrollmentCourses']) ?>",
                            type: "GET",
                            data: { id: "<?= h($user->id) ?>" },
                            headers: {
                                'X-CSRF-Token': csrfToken
                            },
                            success: function(response) {
                                $('#ajax-replace').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error en AJAX:", status, error);
                            }
                        });
                    }
                }
            });
        }
    });
});
</script>