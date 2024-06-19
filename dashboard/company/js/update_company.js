$(document).ready(() => {
    $(".frm_profile_company").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_profile_company').serializeArray()
        
        $.ajax({
            url : "./routes/update_company.php",
            method: "post",
            data : data,
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
            }
        });
    });
});