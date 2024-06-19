

$(document).click(function(){
    $(".profile_box").hide();
});
$(document).ready(function() {
    $(".btn_user").click((e)=>{
        e.stopPropagation();
        $(".profile_box").toggle();
    });
    $(".profile_box").click(e => {
        e.stopPropagation();
    })


    $(".input_upload_field").each(function (i,e){
        var element = e;
        $(e).on("change",(e)=>{
            var input_upload_field = e.currentTarget;
            const [file] = input_upload_field.files
    
            var preview = input_upload_field.dataset.preview
            var seton  = input_upload_field.dataset.set

            if (file) {
                var profile_picture = document.querySelector(`.${preview}`);
    
                profile_picture.src = URL.createObjectURL(file)
    
                var selected_image = $(input_upload_field)[0].files[0];
    
                var form_data = new FormData();
                form_data.append('file', selected_image);
                form_data.append('set', seton);
    
                $.ajax({
                    url : "./routes/update_pictures.php",
                    method: "post",
                    data : form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (res) => {
                        console.log(res)
                        if(res.success){
                            Swal.fire(
                                'Success',
                                `${res.message}`,
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Failed',
                                `${res.message}`,
                                'error'
                            )
                        }
                    },
                    error: (err) => {
                        console.log("Error")
                        console.log(err)
                    }
                });
            }
        });
    });
});

