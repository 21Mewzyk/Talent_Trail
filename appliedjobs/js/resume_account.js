$(document).ready(() => {
    $(".frm_resume_account").on("submit",(e) => {
        e.preventDefault();
        
        var form_data = new FormData();

        var file_data = $('.fileToUpload').prop('files')[0];
        form_data.append("file",file_data);

        $.ajax({
            url : "./routes/resume_account.php",
            type: "post",
            contentType: false,
            processData: false,
            data : form_data,
            success: (res) => {
                console.log(res)
                if(res.success){
                    Swal.fire(
                        'Success',
                        `${res.message}`,
                        'success'
                    ) 
                    setTimeout(() => {
                        window.location.href="./?page=resume"
                    }, 1000);
                }else{
                    Swal.fire(
                        'Failed',
                        `${res.message}`,
                        'error'
                    )
                }
            }
        });
    });
});