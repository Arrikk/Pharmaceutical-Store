$('#supply-form').on('submit', function(e){
    e.preventDefault();
    let form = this
    let yj_code = $('input[name="yj_code"]').val()
    let product_name = $('input[name="product_name"]').val()
    let shippment_status = $('select[name="shippment_status"]').val()
    let correspondence_status = $('select[name="correspondence_status"]').val()
    let expected_time = $('input[name="expected_time"]').val()
    let btn = $('#register-btn')

    if(yj_code == '' || product_name == '' || shippment_status == '' || correspondence_status == '' || expected_time == ''){
        NioApp.Toast("Some input fields are required", 'warning')
    }else{
        
        btn.html(bz.loader).attr('disabled', 'disabled')
        $.ajax({
            url: '/api/supply/',
            method: 'POST',
            headers: bz.headers,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(e){
                console.log(e)
                btn.text('Register').attr('disabled', false)
                NioApp.Toast("You added a new supply information", 'success')
                $(form)[0].reset()
            },
            error: function(e){
                btn.text('Register').attr('disabled', false)
                NioApp.Toast(e.responseJSON.error, 'error')
            }
        })
    }
})

$('input[type="file"]').on('change', function(e){
    let file = e.target.files[0]
    $('input[name="material_val"]').val(file.name)
})