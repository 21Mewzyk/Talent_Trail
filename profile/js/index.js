$(document).ready(() => {
    $(".input_upload_field").on("change",()=>{
        var input_upload_field = document.querySelector('.input_upload_field');
        var profile_picture = document.querySelector('.profile_picture');
    
        const [file] = input_upload_field.files
        if (file) {
            profile_picture.src = URL.createObjectURL(file)
    
            var selected_image = $(".input_upload_field")[0].files[0];
    
            var form_data = new FormData();
            form_data.append('file', selected_image);
            form_data.append('set', input_upload_field.dataset.set);
    
            $.ajax({
                url : "./routes/update_pictures.php",
                method: "post",
                data : form_data,
                contentType: false,
                cache: false,
                processData: false,
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
                },
                error: (err) => {
                    console.log("Error")
                    console.log(err)
                }
            });
        }
    });

    $(".fileToUpload").on("change", function(e){
        var filename = $('.fileToUpload').val().split('\\').pop();

        
        var fp = $(".fileToUpload");
        var length = fp[0].files.length;
        var items = fp[0].files;
        

        function formatBytes(bytes, decimals = 2) {
            if (!+bytes) return '0 Bytes'
        
            const k = 1024
            const dm = decimals < 0 ? 0 : decimals
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
        
            const i = Math.floor(Math.log(bytes) / Math.log(k))
        
            return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
        }

        if(length > 0){
            var fileSize = items[0].size;
    
            $(".btn_upload_picture").html(`<p>${filename} - ${formatBytes(fileSize)}</p>`);
        }
    });
});