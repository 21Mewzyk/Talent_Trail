$(document).ready(() => {
    $(".frm_profile_account").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_profile_account').serializeArray()
        $.ajax({
            url : "./routes/update_account.php",
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