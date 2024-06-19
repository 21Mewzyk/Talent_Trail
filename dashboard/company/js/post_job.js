$(document).ready(() => {
    $(".post_job").on("submit",(e) => {
        e.preventDefault();

        setTimeout(function() {
             var data = $('.post_job').serializeArray()
                $.ajax({
                    url : "./routes/post_job.php",
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
                                window.location.href = "?page=hire&sub=list"
                            }, 500);
                        }else{
                            Swal.fire(
                                'Failed',
                                `${res.message}`,
                                'error'
                            )
                        }
                    }
                });
            
        }, 1000);
       
        
    });
});