$(document).ready(function(){
    $('.checkbox').on('click',function(){
        var limit = $('input[type="checkbox"]:checked').length > 0;
        if(limit){
            $('#del').show();
        } else {
            $('#del').hide();
        }
    })

    $('#del').on('click',function(){
        var segments = window.location.href.split( '/' );
        var uri = segments[5];

        var checkValues = $('input[name=cekdata]:checked').map(function(){
                return $(this).val();
            }).get();

            console.log(checkValues);

            $.ajax({
                url: 'delete',
                type: 'post',
                data: { id: checkValues },
                success:function(data){
                    alert('data deleted successfully');
                    window.location.reload();
                },
                error: function(e){
                    console.log("An error occurred with the system");
                  }   
            });
    });

    $('.status').on('click', function(e){
        e.preventDefault();

        const url   = $(this).attr('href');
        const type  = $(this).data('type');
        const hash  = $(this).data('hash');
        const message = `Are you sure you want to change this ${type} status?`

        Swal.fire({
			title: `${message}`,
            text: "you can change it later!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `change this ${type} status`, 
            cancelButtonText: "don't change it"
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = `${url}?hash=${hash}`;
			}
		});
    });

    $("#modelId").on('shown.bs.modal', function () {
        $(document).off('focusin.modal');
    });

 });

 let deleteCurrentRow = (elem, id) => {
    const Loc = window.location.pathname.split('/')[1]
    const type  = $(elem).data('type');
    const message = `Are you sure you want to delete this ${type}?`

    Swal.fire({
        title: `${message}`,
        text: "You will not be able to restore it once it has been deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'I know, delete it!', 
        cancelButtonText: "don't delete"
    }).then((result) => {
        $.ajax({
            type: "GET",
            url: `${location.origin}/api/${Loc.toLowerCase()}/delete/${id}`,
            dataType: "JSON",
            success: function (res) {
                if (result.isConfirmed) {
                    if(res.error == null){
                        Swal.fire({
                            icon: 'success',
                            title: `${type} deleted successfully`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        
                        myTable.row($(elem).parents("tr")).remove().draw();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: res.messages.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            },
            beforeSend: function() {
                Swal.fire({
                    title: 'Please Wait !',
                    html: 'trying to delete data',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });
            }
        });
    });
}

 let changeStatus = (elem, id) => {
    const Loc = window.location.pathname.split('/')[1]
    const type  = $(elem).data('type');
    const message = `Are you sure you want to change this ${type} status?`

    Swal.fire({
        title: `${message}`,
        text: "you can change it later!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `change this ${type} status`, 
        cancelButtonText: "don't change it"
    }).then((result) => {
        $.ajax({
            type: "GET",
            url: `${location.origin}/api/${Loc.toLowerCase()}/change_status/${id}`,
            dataType: "JSON",
            success: function (res) {
                if (result.isConfirmed) {
                    if(res.error == null){
                        Swal.fire({
                            icon: 'success',
                            title: `status ${type} changed successfully`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        
                        myTable.draw();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: res.messages.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            },
            beforeSend: function() {
                Swal.fire({
                    title: 'Please Wait !',
                    html: 'trying to change data',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });
            }
        });
    });
}


