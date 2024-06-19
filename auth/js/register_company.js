$(document).ready(() => {
    $(".register_company").on("submit",(e) => {
        if ($('.accept_condition').is(':checked')) {
           if ($('#accept_condition').is(':checked')) {
                e.preventDefault();
                var data = new FormData();

                //Form data
                var form_data = $('.register_company').serializeArray();
                $.each(form_data, function (key, input) {
                    data.append(input.name, input.value);
                });

                //File data
                var file_data = $('input[name="valid_photo"]')[0].files;
                for (var i = 0; i < file_data.length; i++) {
                    data.append("valid_photo[]", file_data[i]);
                }

                var file_data2 = $('#letterofcontent')[0].files[0];
                data.append("letterofcontent", file_data2);
                var file_data3 = $('#companyprofile')[0].files[0];
                data.append("companyprofile", file_data3);
                var file_data4 = $('#birform')[0].files[0];
                data.append("birform", file_data4);
                var file_data5 = $('#businesspermit')[0].files[0];
                data.append("businesspermit", file_data5);
                var file_data6 = $('#secdtipermit')[0].files[0];
                data.append("secdtipermit", file_data6);
                var file_data7 = $('#licensepermit')[0].files[0];
                data.append("licensepermit", file_data7);

                //Custom data
                // data.append('key', 'value');

                $.ajax({
                    url : "../auth/routes/register_company.php",
                    method: "post",
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (res) {
                        if(res.success){
                            Swal.fire(
                                'Success',
                                `${res.message}`,
                                'success'
                            )
                            setTimeout(() => {
                                window.location.href = "?a=already";
                            }, 1000);
                        }else{
                            Swal.fire(
                                'Failed',
                                `${res.message}`,
                                'error'
                            )
                        }
                    },
                    error: function (e) {
                        //error
                    }
                });
            } else {
                // var val = $('#decline_condition').val();
               alert('Please Accept All Terms and Aggreement!');
               setTimeout(() => {
                    window.location.href = "?a=join";
                }, 1000);
            }
        } else {
            alert('Please Accept All the Terms and Aggreement!');
            setTimeout(() => {
                window.location.href = "?a=join";
            }, 1000);
            
        }

        
        
    });
});