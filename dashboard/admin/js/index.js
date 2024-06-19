

$(document).click(function(){
    $(".profile_box").hide();
});
$(document).ready(() => {
    $(".btn_user").click((e)=>{
        e.stopPropagation();
        $(".profile_box").toggle();
    });
    $(".profile_box").click(e => {
        e.stopPropagation();
    })
    $(".input_upload_field").on("change",()=>{
        var input_upload_field = document.querySelector('.input_upload_field');
        var profile_picture = document.querySelector('.profile_picture');

        

        const [file] = input_upload_field.files
        if (file) {
            profile_picture.src = URL.createObjectURL(file)

            var selected_image = $(".input_upload_field")[0].files[0];

            var form_data = new FormData();
            form_data.append('file', selected_image);
            form_data.append('set', input_upload_field.dataset.set);

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