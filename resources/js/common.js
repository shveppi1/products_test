$( document ).ready(function() {
    $('.products  tr').on('click', function () {

        let getNewData = (!dataDetail.id) ? true :
            (dataDetail.id && dataDetail.id !== $(this).data('id')) ? true : false;
        if(getNewData) {
            $.ajax({
                url: '/products/' + $(this).data('id'),
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    dataDetail = data;

                    if (dataDetail.name) {
                        $('#product_detail').iziModal('open');
                    }
                }
            });
        } else {
            $('#product_detail').iziModal('open');
        }
    })
});
