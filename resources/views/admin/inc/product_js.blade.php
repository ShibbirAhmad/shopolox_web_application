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



{{-- //modal --}}

<div class="modal" id="__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="__modal__title">Modal title</h5>

            </div>

            <div class="modal-body" id="__modal_body">
                <div class="d-flex justify-content-between mx-5 mt-3 mb-5" id="modal_loading">
                    <div class="spinner-border text-success align-self-center loader-lg"></div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

   
        //category wise sub category
        $('#product_row').on('change','#p_category',function(e) {
            let id=$(this).val();
            console.log(id)
            let $action = "{{ route('category.show',':id') }}";
            console.log($action)
            $.ajax({
                url: $action.replace(':id',id),
                type: "GET",
                cache: false,
                success: function(resp) {
                    let option=`<option disabled> Select  Sub Category</option>`;
                    if(resp.sub_categories.length>0){
                        resp.sub_categories.forEach(element=>{
                            option+=`<option value=${element.id}>${element.name}</option>`
                        })
                    }else{
                         option=`<option disabled>Select  Sub Category</option>`;
                    }                    
                    $('#product_row').find("#p_sub_category").html(option);
                },
                error: function(e) {
                    alert("something went wrong");
                }
            });
        
        })



             //sub category wise sub category
             $('#product_row').on('change','#p_sub_category',function(e) {
            let id=$(this).val();
            console.log(id)
            let $action = "{{ route('sub_category.show',':id') }}";
            console.log($action)
            $.ajax({
                url: $action.replace(':id',id),
                type: "GET",
                cache: false,
                success: function(resp) {
                    let option=`<option disabled> select sub sub category</option>`;
                    if(resp.sub_sub_categories.length>0){
                        resp.sub_sub_categories.forEach(element=>{
                            option+=`<option value=${element.id}>${element.name}</option>`
                        })
                    }else{
                         option=`<option disabled>select sub sub category</option>`;
                    }                    
                    $('#product_row').find("#p_sub_sub_category").html(option);
                },
                error: function(e) {
                    alert("something went wrong");
                }
            });
        
          })


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
