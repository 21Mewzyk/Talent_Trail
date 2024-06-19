$(document).ready(() => {
    $(".frm_general_information").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_general_information').serializeArray()
        $.ajax({
            url : "./routes/update_general.php",
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