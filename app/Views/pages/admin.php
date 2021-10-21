<?= $this->extend('layout/content'); ?>


<?=  $this->section('content') ?>

<?= $this->include('_component/_user/_addAndEdit') ?>
<?= $this->include('_component/_user/_changePassword') ?>

<!-- tabel -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Created </th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
var myTable
$('#loading').hide(0);

//change back
$('.tambah').on('click', () => {
    $('#loading').hide(0);
    $('#isi').show(0);
    $('#pass').show();
    $('.modal-title').html('Tambah admin');

    $('#level').val('');
    $('#name').val('');
    $('.add').show('');
    $('#email').val('');
    $('#id').val('');
});

//ajax start
$(document).ready(function() {
    myTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url() ?>/api/admin'
        },
        columns: [{
                data: 'fullname',
                name: 'Full name'
            },
            {
                data: 'email',
                name: 'Email'
            },
            {
                data: 'created_at',
                name: 'Created_at'
            },
            {
                data: 'role',
                name: 'Role'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
        order: [
            [2, "desc"]
        ]
    });

})
</script>
<?= $this->endSection() ?>