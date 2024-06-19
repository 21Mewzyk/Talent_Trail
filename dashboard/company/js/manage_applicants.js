$(document).ready(() => {
    $(".btn_hired").each((i,e)=>{
        $(e).click(()=>{
            var id = e.dataset.id;
            var action = e.name == 'hired' ? 2 : 3;
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
                    action: action
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
              url : "../admin/routes/manage_applicants.php",
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
            url : "../admin/routes/manage_applicants.php",
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



$(".set_schedule").each((i,e)=>{
  $(e).click(()=>{
      var id = e.dataset.id;
      var modal = document.getElementById("set_schedule");
      modal.style.display = "block";
      $('#body_sechudel').remove();
      $.ajax({
        url : "./routes/set_schedule.php",
        method: "post",
        data : {
          id : id,
          action : "set_schudle"
        },
        success: (data) => {
           $('#content_schedule').append(data);
        }
      });
  });
});





$("#form_set_schedule").on("submit",(e) => {
  e.preventDefault();
  var data = $('#form_set_schedule').serializeArray();

    $.ajax({
      url : "../admin/routes/manage_applicants.php",
      method: "post",
      data : data,
      success: (res) => { 
          // console.log(data)
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
  
  });


});