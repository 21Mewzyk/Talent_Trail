$(document).ready(() => {
    $(".frm_report_company").on("submit",(e) => {
        e.preventDefault();
        
        var data = $('.frm_report_company').serializeArray()
        $.ajax({
            url : "./routes/report_company.php",
            type: "post",
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