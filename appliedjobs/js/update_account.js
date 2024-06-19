$(document).ready(() => {
    $(".frm_general_information_account").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_general_information_account').serializeArray()
        $.ajax({
            url : "./routes/update_account.php",
            method: "post",
            data : data,
            success: (res) => {
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