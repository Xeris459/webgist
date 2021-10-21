<!-- modal -->
<!-- Button trigger modal -->
<button type="button" class="btn tambah btn-primary mb-3" data-toggle="modal" data-target="#modelId">
    Tambah <?= $page ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Tambah <?= $page ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="form" enctype="multipart/form-data">
                <div class='modal-body' id="loading">
                    <div class="lds-dual-ring"></div>
                </div>
                <!-- default set for edit -->
                <input type="hidden" name="id" id="id">
                <?= csrf_field(); ?>

                <!-- end ganti password -->
                <div class="modal-body" id="isi">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Name Category</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=  $this->section('script') ?>
<script>
$('#form').on('submit', function(e) {
    e.preventDefault();
    const id = $('#id').val()
    const data = $('#form').serializeArray()
    const page = '<?= $page ?>'
    const baseUrl = location.origin

    if (id) {
        var url = `${baseUrl}/api/${page}/update/` + id
        var title = `apakah kamu yakin akan mengubah ${page} ini?`
        var message = ""
    } else {
        var url = `${baseUrl}/api/${page}/create`
        var title = `apakah kamu yakin ingin menyimpan data ${page} ini?`
        var message = ""
    }

    Swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Save this ${page}`,
        cancelButtonText: "don't save it"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function(response) {
                    $('input[name="csrf_test_name"]').val(response.csrf_hash)
                    Swal.fire({
                        icon: 'success',
                        title: `${page} berhasil disimpan`,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    myTable.draw();
                    $('#modelId').modal('toggle')

                },
                error: function(data) {
                    var text = '';
                    $.map(data.responseJSON.messages, function(val) {
                        text +=
                            `<div class="card"><div class="card-body">${val}</div></div><br>`
                    });

                    Swal.fire({
                        icon: 'error',
                        title: 'ops..',
                        html: text,
                        showConfirmButton: false,
                        timer: 8000
                    })
                },
                complete: function(data) {
                    if (data.status == 500) {
                        Swal.fire({
                            icon: 'error',
                            title: 'server time out',
                            showConfirmButton: false,
                            timer: 8000
                        })
                    }
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'trying saving data',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        },
                    });
                }
            });
        }
    })
})

function edit(edit) {
    var id = edit;
    const page = '<?= $page ?>'
    const baseUrl = location.origin

    $('#loading').show(0);
    $('#isi').hide();
    $('.modal-title').html('Edit ' + page);
    $('#form').attr('action', `${baseUrl}/${page}/edit`);

    $.ajax({
        type: "GET",
        url: `${baseUrl}/api/${page}/read/${id}`,
        dataType: "JSON",
        success: function(data) {
            if (data.error == null) {
                $('#title').val(data.result.title);
                $('#id').val(data.result.id);
            }
        }
    }).done(function() {
        setTimeout(function() {
            $("#loading").fadeOut(300);
            $('#isi').delay(300).show(1000);
        }, 500);
    });
};
</script>
<?= $this->endSection() ?>