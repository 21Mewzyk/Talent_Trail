

$(document).ready(() => {
    $(".btn_delete_company").click((e)=>{
        Swal.fire({
            icon: 'question',
            title: 'Do you want to delete this company? Including all the publisher, applicants and job posted.',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(".btn_delete_company").data("id");
                $.ajax({
                    url : "./routes/delete_company.php",
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
                                window.location.href = "?page=hire&sub=company"
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