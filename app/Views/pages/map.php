<?= $this->extend('layout/content'); ?>

<?=  $this->section('content') ?>
<template>
    <div class="card bg-light mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" class="form-control" name="nik[]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">
                            Nama Lengkap
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <input type="text" class="form-control" name="nama[]" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="date[]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">
                            Jenis Kelamin
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <select class="form-control" name="jk[]" required>
                            <option value="" selected disabled>-- select one --</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">
                            Agama
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <select class="form-control" name="agama[]" required>
                            <option value="" selected disabled>-- select one --</option>
                            <option value="islam">Islam</option>
                            <option value="katolik">Katolik</option>
                            <option value="kristen">Kristen</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">
                            Status perkawinan
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <select class="form-control" name="status[]" required>
                            <option value="" selected disabled>-- select one --</option>
                            <option value="belum menikah">belum menikah</option>
                            <option value="menikah">menikah</option>
                            <option value="janda">janda</option>
                            <option value="duda">duda</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">
                            Apakah sudah bekerja?
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <select onchange="showHiddenInput(this)" class="form-control" name="bekerja[]" required>
                            <option value="" selected disabled>-- select one --</option>
                            <option value="0">belum</option>
                            <option value="1">sudah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan[]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">pendapatan perbulan</label>
                        <input type="number" class="form-control" name="pendapatan[]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">
                            Apakah masih sekolah/kuliah?
                            <small>
                                <font color="red">*</font>
                            </small>
                        </label>
                        <select onchange="showHiddenInput(this)" class="form-control" name="bersekolah[]" required>
                            <option value="" selected disabled>-- select one --</option>
                            <option value="0">sudah tidak</option>
                            <option value="1">masih bersekolah / kuliah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="asalSekolah[]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">jenjang pendidikan</label>
                        <input type="text" class="form-control" name="jenjang[]">
                        <small>contoh: SD, SMP, SMA, D3, S1 / Sarjana 1</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">
                            Apakah kepala Keluarga
                        </label>
                        <select class="form-control" name="kepala[]">
                            <option value="" selected disabled>-- select one --</option>
                            <option value="0" selected>tidak</option>
                            <option value="1">iya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<button type="button" class="btn btn-primary mb-4" id="activeSetMainView" onclick="activeSetMainView()">Set Masjid
    Location</button>
<button type="button" class="btn btn-primary mb-4 d-none" id="saveCurrentLocation" onclick="saveCurrentLocation()">Save
    Current
    Masjid Location</button>

<div class="row">
    <div class="col-12">
        <div id="maps" style="widht: 100%; height: 500px"></div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Tambah Keluarga
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= site_url('map/save') ?>" id="form" enctype="multipart/form-data">
                <!-- default set for edit -->
                <input type="hidden" name="id" id="id">
                <?= csrf_field(); ?>

                <div class="modal-body" id="mark">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" class="form-control" readonly name="lat" id="lat">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" class="form-control" readonly name="lon" id="lon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">
                                    Nama Keluarga
                                    <small>
                                        <font color="red">*</font>
                                    </small>
                                </label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="" selected disabled>-- select one --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Custom color</label>
                                <input type="color" class="form-control" name="color" id="color">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Select color</label>
                                <div class="d-flex justify-content-start  align-items-cente">
                                    <label>
                                        <input type="radio" name="customColor" value="#343A40"
                                            class="customColor card-input-element d-none">
                                        <div
                                            class="card card-body bg-light black d-flex flex-row justify-content-between align-items-center">
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="customColor" value="#7952B3"
                                            class="customColor card-input-element d-none">
                                        <div
                                            class="card card-body bg-light purple d-flex flex-row justify-content-between align-items-center">
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="customColor" value="#FFC107"
                                            class="customColor card-input-element d-none">
                                        <div
                                            class="card card-body bg-light yellow d-flex flex-row justify-content-between align-items-center">
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="customColor" value="#FF2442"
                                            class="customColor card-input-element d-none">
                                        <div
                                            class="card card-body bg-light red d-flex flex-row justify-content-between align-items-center">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">upload foto rumah</label>
                        </div>
                        <div class="col-6 image-area">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAADGCAMAAADFYc2jAAAAMFBMVEX09PTMzMzt7e3T09PQ0NDh4eHb29vx8fHJycnn5+fNzc3Y2NjV1dXo6Ojw8PDe3t4Ogsu9AAACF0lEQVR4nO3b23KDIBRAUQEvCBr//2+ruUnEpgEfLCd7TV86CTPZ0RoCtqoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMD/MU5tpmk8+7Ufpo21KpO1Rp/9+o+51LnttzegvpxdcIifG1x+vlP+7IIjuiXdmUxLft2d3XCAXk7gPnd0s1w1Sv7r13OAzQ7Q5JNfrpd8PQ2D7xMuZaLy23kaM//Un0/lJOUPz8nfx/2C8qd16utSRsvI74LJr20SRsvIH8PvPUPCaBn5fZhf7z3VxLN7mfluL98oG/XLydfq/clvlmvCtl9OfhVe+uLvQOb2iI9HC8kPzv743DePN8ZHo4Xkrx/8LlrAMeuZ4bejpeRXvVt+sT6a9Af1r8dfVP6y5jv18dpdWP96/IXl79rUK7t+LnxBfrwSvPbLz99bB3/2i8/f3wV49IvMD9Y7ftsDufdLzK/XWd/vO0C3foH5S/K9/93+1/Up4vLvqx7XuLe7fyLzn2s+dnxfLzJ/XfFy9o+dX4H5XcJmt7z8lHp5+d12cv9V+UnHXlx+6k0uwvKbxPubyCeffPLLFeSn9QvLH33b+s+1XleS8rNHk18u8pVtukzF39R6ud7NXedxyjlX9C3NVZv9vwz3D8Dp7IJDuvpQvzVFH/z59PfKZlNt4fUz3eTqS77sAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgzw/DShuYb6JumwAAAABJRU5ErkJggg=="
                                alt="home" id="imageResult" style="width:100%; max-height: 300px" class="mb-4">
                        </div>
                        <div class="col-6">
                            <!-- Upload image input-->
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" name="rumah" onchange="readURL(this);"
                                    class="form-control border-0">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose
                                    file</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Choose
                                            file</small></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="family">
                    <div id="addAnggotaKeluarga">
                        <div onclick="addAnggotaKeluarga()" type="button" class="btn btn-primary float-right">Tambah
                            Anggota
                            Keluarga</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info" id="prev">prev</button>
                    <button type="button" class="btn btn-primary" id="next">Next</button>
                    <button type="submit" class="btn btn-primary" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?=  $this->section('script') ?>
<script>
var setMainView = false
const map = L.map('maps').setView({
    lat: <?= $lat ?>,
    lon: <?= $lon ?>
}, 18)

// var masjid = L.icon({
//     iconUrl: 'data:image/png;base64,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',
//     iconSize: [32, 32],
// });

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
}).addTo(map);

marker = L.marker({
    lat: <?= $lat ?>,
    lon: <?= $lon ?>
}, {
    id: 'mainview',
    draggable: false,
    // icon: masjid
}).bindPopup('Hello Indonesia', {
    maxWidth: 1000,
    minWidth: 500
}).addTo(map);

function onMapClick(e) {
    showModal(e.latlng.lat, e.latlng.lng)
}

map.on('click', onMapClick);

let showModal = (lat, lon) => {

    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    var input = event.srcElement;
    infoArea.textContent = 'Choose file'

    $('#family .card').remove()
    $('#mark').show()
    $('#family').hide()
    $('#family').prepend(showTemplate());
    $("#lat").val(lat)
    $('#prev').hide()
    $('#save').hide()
    $('#next').show()
    $("#lon").val(lon)
    $('#title').val('')
    $('#category').val('')
    $('#color').val('#000000')
    $('.customColor').prop('checked', false);
    $('#upload').val('')
    $('#imageResult').attr('src',
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAADGCAMAAADFYc2jAAAAMFBMVEX09PTMzMzt7e3T09PQ0NDh4eHb29vx8fHJycnn5+fNzc3Y2NjV1dXo6Ojw8PDe3t4Ogsu9AAACF0lEQVR4nO3b23KDIBRAUQEvCBr//2+ruUnEpgEfLCd7TV86CTPZ0RoCtqoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMD/MU5tpmk8+7Ufpo21KpO1Rp/9+o+51LnttzegvpxdcIifG1x+vlP+7IIjuiXdmUxLft2d3XCAXk7gPnd0s1w1Sv7r13OAzQ7Q5JNfrpd8PQ2D7xMuZaLy23kaM//Un0/lJOUPz8nfx/2C8qd16utSRsvI74LJr20SRsvIH8PvPUPCaBn5fZhf7z3VxLN7mfluL98oG/XLydfq/clvlmvCtl9OfhVe+uLvQOb2iI9HC8kPzv743DePN8ZHo4Xkrx/8LlrAMeuZ4bejpeRXvVt+sT6a9Af1r8dfVP6y5jv18dpdWP96/IXl79rUK7t+LnxBfrwSvPbLz99bB3/2i8/f3wV49IvMD9Y7ftsDufdLzK/XWd/vO0C3foH5S/K9/93+1/Up4vLvqx7XuLe7fyLzn2s+dnxfLzJ/XfFy9o+dX4H5XcJmt7z8lHp5+d12cv9V+UnHXlx+6k0uwvKbxPubyCeffPLLFeSn9QvLH33b+s+1XleS8rNHk18u8pVtukzF39R6ud7NXedxyjlX9C3NVZv9vwz3D8Dp7IJDuvpQvzVFH/z59PfKZlNt4fUz3eTqS77sAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgzw/DShuYb6JumwAAAABJRU5ErkJggg=='
    )

    $('#modelId').modal();
}

$('.customColor').on('click', function() {
    console.log($(this).val())
    $('#color').val($(this).val())
})

$('#next').on('click', function() {
    $('#mark').hide()
    $('#family').show()
    $('#next').hide()
    $('#prev').show()
    $('#save').show()
})

$('#prev').on('click', function() {
    $('#mark').show()
    $('#family').hide()
    $('#prev').hide()
    $('#save').hide()
    $('#next').show()
})

let addAnggotaKeluarga = () => {
    $('#family').prepend(showTemplate())
}

let showHiddenInput = (elem) => {
    const val = $(elem).val()

    if (val == 1) {
        $(elem).parent().parent().parent().next().removeClass('d-none')
    } else {
        $(elem).parent().parent().parent().next().addClass('d-none')
    }
}

let showTemplate = () => {
    return $('template').html()
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $('#upload').on('change', function() {
        readURL(input);
    });
});

var input = document.getElementById('upload');
var infoArea = document.getElementById('upload-label');

input.addEventListener('change', showFileName);

function showFileName(event) {
    var input = event.srcElement;
    var fileName = input.files[0].name;
    infoArea.textContent = 'File name: ' + fileName;
}

/*
 * leafletjs set new main location
 */
var marker
let _setMainView = () => {
    if (setMainView) {
        dragmark(true)
    }

    map.on('move', function() {
        /*
         * leafletjs update market position
         */
        if (setMainView) {
            dragmark(true)
        }
    });
}

/*
 * leafletjs fungsi enakble dan disable dragable
 */
let dragmark = (drag) => {
    marker.setLatLng(map.getCenter(), {
        id: 'mainview',
        draggable: drag
    }).update();
}
/*
 * function for activate setMainView
 */
let activeSetMainView = () => {
    $('#saveCurrentLocation').removeClass('d-none')
    $('#activeSetMainView').addClass('d-none')

    setMainView = true
    _setMainView()
}

/*
 * function for save current location 
 */
let saveCurrentLocation = () => {
    $('#saveCurrentLocation').addClass('d-none')
    $('#activeSetMainView').removeClass('d-none')

    setMainView = false
    dragmark(false)

    $.ajax({
        type: "post",
        url: `${location.origin}/api/map/setlocation`,
        data: JSON.stringify(map.getCenter()),
        dataType: "json",
        success: function(res) {
            console.log(res)
            Swal.fire({
                icon: 'success',
                title: `lokasi baru masjid berhasil disimpan`,
                showConfirmButton: false,
                timer: 1500
            })
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

/*
 * function for save family location 
 */
$('form').on('submit', function(e) {
    e.preventDefault();
    formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: `${location.origin}/api/map/saveLocation`,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            $('input[name="csrf_test_name"]').val(response.csrf_hash)
            const lat = $('#lat').val()
            const lon = $('#lon').val()
            console.log(lat, lon)
            L.marker({
                lat: lat,
                lon: lon
            }, {
                id: response.mark_id,
                draggable: false,
                // icon: masjid
            }).bindPopup('Hello Indonesia', {
                maxWidth: 1000,
                minWidth: 500
            }).addTo(map);

            $('#modelId').modal('toggle')
        }
    });
})

/*
 * load marker dari database
 */
$.ajax({
    type: "GET",
    url: `${location.origin}/api/map/getmarker`,
    dataType: "JSON",
    success: function(res) {
        res.map((v) => {
            L.marker({
                lat: v.latitude,
                lon: v.longtitude
            }, {
                id: v.id,
                draggable: false,
                // icon: masjid
            }).bindPopup(
                `
                <div class="d-flex justify-content-between" style="width: 100%; position: absolute; top: -45px; right: 0px;">
                    <button type="button" class="btn btn-light rounded" style="box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5); -webkit-box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5); -moz-box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5);">
                        <i class="fas fa-list-ul mr-2"></i>
                        Anggota Keluarga
                    </button>
                    <button type="button" class="btn btn-light rounded" style="box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5); -webkit-box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5); -moz-box-shadow: 1px 1px 24px -4px rgba(0,0,0,0.5);">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Hapus
                    </button>
                </div>
                Mark ${v.id} dengan nama keluarga ${v.title} <br> asdasd asdas <br>adas da sdadas
                `, {
                    maxWidth: 1000,
                    className: "test",
                    minWidth: 500
                }).addTo(map);
        })
        Swal.fire({
            icon: 'success',
            title: `Data Loaded`,
            showConfirmButton: false,
            timer: 1500
        })
    },
    complete: function(data) {
        if (data.status == 500) {
            Swal.fire({
                icon: 'error',
                title: 'Failed to load data',
                showConfirmButton: false,
                timer: 8000
            })
        }
    },
    beforeSend: function() {
        Swal.fire({
            title: 'Please Wait !',
            html: 'trying load data',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading()
            },
        });
    }
});
    
    let editPositionMarker = (id) => {
        var new_markers = []
        var currentMarker = null;

        Swal.fire({
            title: `apakah anda yakin ingin merubah posisi marker ini?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin',
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                markers.forEach(function(marker) {
                    if (marker._id == id) {
                        currentMarker = marker
                    }
                })

                currentMarker.closePopup();
                console.log(currentMarker);
                currentMarker.setLatLng(map.getCenter(), {
                    id: currentMarker._id,
                    draggable: true
                }).update();

                map.on('move', function(event) {
                    var position = map.getCenter();
                    console.log(position)
                    currentMarker.setLatLng(position, {
                        id: currentMarker._id,
                        draggable: true
                    }).update();
                });
            }
        });
    }
</script>
<?= $this->endSection() ?>
