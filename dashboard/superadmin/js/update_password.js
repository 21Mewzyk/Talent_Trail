$(document).ready(() => {
    $(".frm_password_account").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_password_account').serializeArray()
        $.ajax({
            url : "./routes/update_password.php",
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
                    setTimeout(() => {
                        window.location.href="./?page=profile&sub=password"
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