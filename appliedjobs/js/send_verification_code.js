$(document).ready(() => {
    $(".frm_general_information_verify").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_general_information_verify').serializeArray()
        $.ajax({
            url : "./routes/send_verification_code.php",
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
                        window.location.href="./?page=general_information&sub=verified"
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