$(document).ready(function (){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.btn-cancel-order').on('click',function (e) {
        e.preventDefault()
        const btn = $(this)
        const id = btn.data('id')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc muốn huỷ đơn?',
            text: "Đơn hàng của bạn sẽ bị huỷ! Bạn có thể đặt lại đơn hàng khác",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Huỷ đơn!',
            cancelButtonText: 'Không!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/CancelOrder/'+ id,
                    type: 'GET',
                }).done(function (res){
                    swalWithBootstrapButtons.fire(
                        'Đã Huỷ!',
                        res,
                        'success'
                    )
                    let parent = btn.parents('.user-order')
                    parent.find('.status-order').html('Đã Huỷ');
                    parent.find('.btn-cancel-order').remove();
                }).fail(function (res){
                    swalWithBootstrapButtons.fire(
                        'Chưa Huỷ',
                        'Đơn hàng của bạn chưa được huỷ',
                        'error'
                    )
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Chưa Huỷ',
                    'Đơn hàng của bạn chưa được huỷ',
                    'error'
                )
            }
        })
    })

    $('.btn-addToCart').on('click',function (e){
        e.preventDefault()
        const id = $(this).data('id')
        $.ajax({
            url: '/AddToCart/'+ id,
            type: 'GET',
        }).done(function (res){
            Swal.fire(
                'Thành công!',
                res.status,
                'success'
            )
            $('.cart-quantity').html(res.cart_quantity)
        }).fail(function (res){
            if(res.status == 401){
                window.location = '/Auth/Login'
            }
            Swal.fire(
                'Thất bại!',
                res.responseJSON,
                'error'
            )
        })
    })

    $('.updateQuantity').on('click',function (e){
        e.preventDefault()
        let btn = $(this)
        const id = btn.data('id')
        const type = btn.data('type')
        const stock = btn.data('stock')

        $.ajax({
            url: '/UpdateQuantity/'+ type +'/'+ id,
            type: 'GET',
        }).done(function (res){
            let parent_tr = btn.parents('tr')
            let quantity = parent_tr.find('.quantityProduct').val()
            let price = Number(parent_tr.find('.prod_price').text().replace(/[^0-9]/g, ''))
            if(type == 'Inc'){
                quantity++
                if(quantity > stock)
                {
                    alert('Vượt quá số lượng trong kho');
                    quantity--
                }
            } else if(type == 'Dec') {
                quantity--
            } else {
                parent_tr.remove()
            }


            if(quantity == 0){
                parent_tr.remove()
            } else {
                parent_tr.find('.quantityProduct').val(quantity)
                let sum = price * quantity
                parent_tr.find('.sum_product').text(sum.toLocaleString('vn')+'đ');
            }

            let total = 0
            let count = 0
            $('.sum_product').each(function (){
                total += parseFloat($(this).text().replace(/[^0-9]/g, ''))
                count++
            })

            $('.total_product').text('Tổng 5 sản phẩm: ' + total.toLocaleString('vn') + 'đ')

            $('.cart-quantity').text(count)
        }).fail(function (res){
            Swal.fire(
                'Thất bại!',
                res.responseJSON,
                'error'
            )
        })
    })

    $('.page-item a').on('click', function (e){
        e.preventDefault()
        var slug = $('.slug-product').val()
        var page = $(this).attr('href').split('page=')[1]

        $.ajax({
            url: '/GetMoreReview/'+ slug +'/?page=' + page,
            type: 'GET',
        }).done(function (data){
            $('.reviewList').html(data);
        })
    })

    $('.status').on('change', function (){
        let stt = $(this).val()
        let id = $(this).data('id');
        let _token = $('input[name=_token]').val()
        $.ajax({
            url: 'UpdateStatus',
            type: 'PUT',
            data: { stt, id, _token }
        }).done(function (res){
            console.log(res)
            toastr["success"](res.status, "Thành Công");
        }).fail(function (res){
            toastr["error"](res.responseJSON.status, "Thất bại")
        })
    })

    $('.show-order-product').on('click',function (e){
        e.preventDefault()
        var id = $(this).data('id')
        $.ajax({
            url: 'Orders/'+id,
            method: 'GET',
        }).done(function (data){
            $('.modal-show-product').html(data)
        })
    })

    CKEDITOR.replace( 'content',{
        language: 'vi',
    } );
    CKEDITOR.replace( 'benefit' ,{
        language: 'vi'
    } );
    CKEDITOR.replace( 'description_prod' ,{
        language: 'vi'
    } );

    $('.delete').on('click',function (e){
        e.preventDefault()
        let id = $(this).data('id')
        let type = $(this).data('type')
        let btn = $(this)
        Swal.fire({
            title: 'Bạn có chắc muốn xoá?',
            text: "Sẽ không thể khôi phục sau khi xoá!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá!',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                let parent_tr = btn.parents('tr')
                $.ajax({
                    url: type+'/'+id,
                    method: 'GET'
                }).done(function (res){
                    parent_tr.remove()
                    toastr["success"](res, "Thành Công");
                }).fail(function (res){
                    toastr["error"](res, "Thất Bại");
                })
            }
        })
    })

    $('.restore').on('click',function (e){
        e.preventDefault()
        let id = $(this).data('id')
        let parent_tr = $(this).parents('tr')
        $.ajax({
            url: 'RestoreProduct/'+id,
            method: 'GET'
        }).done(function (res){
            parent_tr.remove()
            toastr["success"](res, "Thành Công");
        }).fail(function (res){
            toastr["error"](res, "Thất Bại");
        })
    })

    $('.delete-forever').on('click',function (e){
        e.preventDefault()
        let id = $(this).data('id')
        let btn = $(this)
        Swal.fire({
            title: 'Bạn có chắc muốn xoá?',
            text: "Sẽ không thể khôi phục sau khi xoá!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá!',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                let parent_tr = btn.parents('tr')
                $.ajax({
                    url: 'DeleteProductForever/'+id,
                    method: 'GET'
                }).done(function (res){
                    parent_tr.remove()
                    toastr["success"](res, "Thành Công");
                }).fail(function (res){
                    toastr["error"](res, "Thất Bại");
                })
            }
        })
    })

    $('.sort_product').on('change', function (){
        $('.form-sort').submit()
    })
})

function LoadDone(){
    setTimeout(function (){
        document.getElementById('loading-bg').style.setProperty('display', 'none', 'important');
    },1000)
}
