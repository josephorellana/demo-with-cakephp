<section class="mb-5 mt-3">
    <h1>Detalles del curso</h1>
    <hr>
</section>

<section>
<h3><?= h($course->name) ?></h3>
    <table class="table table-hover table-striped">
        <tr>
            <th scope="row">Nombre</th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha de inicio</th>
            <td><?= (!empty($course->start_date)) ? date('d-m-Y', strtotime($course->start_date)) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha de término</th>
            <td><?= (!empty($course->end_date)) ? date('d-m-Y', strtotime($course->end_date)) : '' ?></td>
        </tr>
        <tr>
            <th scope="row">Estado</th>
            <td><?= ($course->is_enabled) ? '<span class="badge text-bg-success">Habilitado</span>': '<span class="badge text-bg-secondary">Deshabilitado</span>' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4>Descripción</h4>
        <?= $this->Text->autoParagraph(h($course->description)); ?>
    </div>
    <hr>
    <div class="related">
        <h4>Estudiantes inscritos</h4>

        <?php if( $authUser['role']['name'] === 'ADMIN' ): ?>
            <div class="dropdown mb-5">
                <div class="row px-0">
                    <div class="col-11 px-0 mx-0">
                        <input type="text" id="student-search" class="form-control mx-0" placeholder="Agregar estudiante: Ingrese nombre, apellido o correo electrónico" autocomplete="off">
                    </div>
                    <div class="col-1 text-center text-bg-success rounded-end py-0">
                        <i class="bi bi-search my-0 align-middle"></i>
                    </div>
                </div>
                <ul class="dropdown-menu w-100" id="student-search-result"></ul>
            </div>
        <?php endif; ?>

        <div id="ajax-replace">
            <?= $this->element('Courses/enrollments_table') ?>
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

    $('#student-search').on('keyup', function() {
        const query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Users', 'action' => 'searchStudent']) ?>",
                type: "GET",
                data: { search: query },
                dataType: "json",
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(data) {
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(function(user) {
                            html += `<li><div class="row"><div class="col"><a class="dropdown-item disabled" href="#">${user.name} ${user.paternal_last_name} ${user.maternal_last_name}</a></div><div class="col text-end"><button class="btn btn-sm btn-success enroll-user me-3" data-id="${user.id}"><i class="bi bi-plus"></i> Agregar</button></div></div></li>`;
                        });
                    } else {
                        html += '<li><a class="dropdown-item disabled" href="#">No se encontraron resultados</a></li>';
                    }
                    $('#student-search-result').html(html).addClass('show');
                },
                error: function(xhr, status, error) {
                    console.error("Error en AJAX:", status, error);
                },
            });
        } else {
            $('#student-search-result').html('').removeClass('show');
        }
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('#student-search-result').removeClass('show');
            $('#student-search').val('');
        }
    });

    $(document).on('click', '.enroll-user', function(e){
        const id = $(this).data('id');
        if( id ) {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Courses', 'action' => 'enroll']) ?>",
                type: "GET",
                data: { 
                    _csrfToken: csrfToken,
                    userId: id,
                    courseId: "<?= h($course->id) ?>"
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
                        $('#student-search-result').removeClass('show');
                        $('#student-search').val('');
                        $.ajax({
                            url: "<?= $this->Url->build(['controller' => 'Courses', 'action' => 'getEnrollmentUsers']) ?>",
                            type: "GET",
                            data: { id: "<?= h($course->id) ?>" },
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

