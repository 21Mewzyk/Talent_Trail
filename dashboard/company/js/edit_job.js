CKEDITOR.replace('content');
$(document).ready(() => {
    var submitted_count = 0
    
    $(".edit_job").on("submit",(e) => {
        e.preventDefault();
        
        if(submitted_count == 0){

            submitted_count++
            $(".btn_submit").text("YOU WANT TO SAVE THE CHANGES? YES");

            
        }else{
            var data = $('.edit_job').serializeArray()
            $.ajax({
                url : "./routes/edit_job.php",
                method: "post",
                data : data,
                success: (res) => {
                    submitted_count = 0;
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
        }
    });
    
    $(".btn_delete_job").click((e)=>{
        Swal.fire({
            icon: 'question',
            title: 'Do you want to delete this item?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(".btn_delete_job").data("id");
                $.ajax({
                    url : "./routes/delete_job.php",
                    method: "post",
                    data : {
                        id : id
                    },
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
            }
        })
    });
});