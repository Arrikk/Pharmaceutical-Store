$('#import-supplies').on('change', function(){
    $('.upload-button').attr('disabled', false)
})

$('.upload-button').click(function(){
    let btn = $(this)
    // let form = $('#upload-form')
    const form = document.getElementById('upload-form')
    console.log(form)
    $.ajax({
        url: '/api/supply/import',
        method: 'POST',
        headers: bz.headers,
        data: new FormData(form),
        processData: false,
        contentType: false,
        beforeSend: function(){
            btn.html(bz.loading).attr('disabled', 'disabled')
        },
        success: function(e){
            Swal.fire("Imported", "Supply information Imported", "success");
            location.reload()
            btn.text("Upload").attr('disabled', false)
        },
        error: function(err){
            btn.text("Upload").attr('disabled', false)
            console.log(err.responseJSON.error)
            Swal.fire("Error", err.responseJSON.error, "error");
        }
    })
})