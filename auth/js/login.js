$(document).ready(() => {
    $(".login_account").on("submit",(e) => {
        e.preventDefault();
        var data = $('.login_account').serializeArray()
        $.ajax({
            url : "../auth/routes/login.php",
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
                        window.location.href = "../"
                    },2000)
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