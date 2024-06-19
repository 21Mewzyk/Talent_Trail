$(document).ready(() => {
    $(".btn_hired").each((i,e)=>{
        $(e).click(()=>{
            var id = e.dataset.id
            Swal.fire({
              icon: 'question',
              title: 'Hire?',
              text: 'Do you want to continue this action?',
              showCancelButton: true,
              confirmButtonText: 'Yes',
            }).then((result) => {
              if(result.isConfirmed){
                $.ajax({
                  url : "./routes/manage_applicants.php",
                  method: "post",
                  data : {
                    id : id,
                    action: 2
                  },
                  success: (res) => {
                      console.log(res)
                      if(res.success){
                          setTimeout(() => {
                              window.location.href = "?page=hire&sub=applicants"
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

    $(".btn_decline").each((i,e)=>{
      $(e).click(()=>{
          var id = e.dataset.id
          Swal.fire({
            icon: 'question',
            title: 'Decline?',
            text: 'Do you want to continue this action?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
          }).then((result) => {
            if(result.isConfirmed){
              $.ajax({
                url : "./routes/manage_applicants.php",
                method: "post",
                data : {
                  id : id,
                  action: 3
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
                            window.location.href = "?page=hire&sub=applicants"
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

  $(".btn_archive").each((i,e)=>{
      $(e).click(()=>{
          var id = e.dataset.id
          Swal.fire({
            icon: 'question',
            title: 'Archive?',
            text: 'Do you want to continue this action?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
          }).then((result) => {
            if(result.isConfirmed){
              $.ajax({
                url : "./routes/manage_applicants.php",
                method: "post",
                data : {
                  id : id,
                  is_archive: 1,
                  action : "archive"
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
                            window.location.href = "?page=hire&sub=applicants"
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


  $(".btn_archive_restore").each((i,e)=>{
    $(e).click(()=>{
        var id = e.dataset.id
        Swal.fire({
          icon: 'question',
          title: 'Restore?',
          text: 'Do you want to continue this action?',
          showCancelButton: true,
          confirmButtonText: 'Yes',
        }).then((result) => {
          if(result.isConfirmed){
            $.ajax({
              url : "./routes/manage_applicants.php",
              method: "post",
              data : {
                id : id,
                is_archive: 0,
                action : "archive"
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
                          window.location.href = "?page=hire&sub=applicants"
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



  
});