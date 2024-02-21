export default class ModalController {
    newModal(element, options)
    {
        element.iziModal(options);
    }

    getDetailContent () {
        return $(`
                <div class="flex justify-between">
                    <h2 class="mb-2">${dataDetail.name}</h2>
                    <div class="btns_detail">
                        <span id="edit_el">изменить</span>
                    </div>
                </div>
                <ul>
                    <li><span>Артикул</span> <strong>${dataDetail.article}</strong></li>
                    <li><span>Название</span> <strong>${dataDetail.name}</strong></li>
                    <li><span>Статус</span> <strong>${dataDetail.status}</strong></li>
                    <li><span>Атрибуты</span> <strong>${dataDetail.data}</strong></li>
                </ul>
            `);
    }

    getEditForm () {

        var res = $.ajax({
            url: '/products/' + dataDetail.id + '/edit',
            method: 'get',
            dataType: 'html',
            global: false,
            async:false,
        }).responseText;

        return res;

    }

}


let modalController = new ModalController();
let btnOpenProductForm = document.getElementById('btn_open_form');

if(btnOpenProductForm) {

    let modalElement = $('#product_add_form');
    let modalOption = {};
    modalController.newModal(modalElement, modalOption)

    let btnOpenModalId = '#btn_open_form';

    $('body').on('click', btnOpenModalId, e => {
        e.preventDefault();
        modalElement.iziModal('open');
    })

}

if(document.getElementById('content-table')) {


    // product edit form
    let modalEdit = $('#product_edit');
    let modalOptionEdit = {
        onOpening: () => {

            let content = modalController.getEditForm();
            modalEdit.find('.detail_wrapp').html(content);
        }
    };

    modalController.newModal(modalEdit, modalOptionEdit);



    // product show detail
    let modalElementShow = $('#product_detail');
    let modalOptionShow = {
        onOpening: () => {

            let content = modalController.getDetailContent();

            // событие на изменение
            content.find('#edit_el').on('click', () => {
                modalElementShow.iziModal('close');
                modalEdit.iziModal('open');
            })

            modalElementShow.find('.detail_wrapp').html(content);
        }
    };
    modalController.newModal(modalElementShow, modalOptionShow);


}
