<script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });

</script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('admin/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard/dash_1.js') }}"></script>


<script>
    $(document).ready(function() {

        $('#product_row').find('#r_price,#p_discount').on('keyup',function (e) {
             $regular_price = $('#r_price').val() ;
             $sale_discount = $('#p_discount').val() ; 
             $sale_price = ( $regular_price - $sale_discount ) ;
             $('#s_price').val($sale_price);
             console.log($sale_price); 
        });
     


        ///form submit
      $('#product_container').on('submit', '#submit_form', function(e) {
                  event.preventDefault()
            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                // beforeSend: function () {
                //     $('.preloader').show();
                // },
                //success function
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        window.history.back();
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> important errors</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("some thing went wrong");
                }
            });
        });

        function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                type: 'success',
                title: message
            })

            setTimeout(() => {
                location.reload();
            }, 1000);
        }

    });

</script>
