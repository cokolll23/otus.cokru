BX.ready(function (e) {
    $('body').on('click', 'tr #UF_CRM_3_HISTORY', function (e) {
        //id lists_list_elements_17  #UF_CRM_5_HIST_LINK
        e.preventDefault();
        if ($(e.target).parents('tr')) {
            // todo при клике на tr авто из списка  находим id элемента в GarageTable
            var iGarageTableId = $(e.target).parents(' tr').data('id');
            alert(iGarageTableId);

           var request = BX.ajax.runComponentAction('lab.crmcustomtab:deals.grid', 'test', {
                mode: 'class',
                data: {
                    param1: iGarageTableId,
                    sessid: BX.message('bitrix_sessid')
                }
            });
            // промис в который прийдет ответ
            request.then(function (response) {
                console.log(response);
            });



            // слайдер справа выводит по ссылке на физ страницу с компонентом выводящим
            // историю обращений /bitrix/components/lab.crmcustomtab/deals.grid
            BX.SidePanel.Instance.open('/flp/index.php?id=' + iGarageTableId);
        }
    })
});

function sendAjax(url, method = 'post', data = {}, node_target = '') {
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        cache: false,
        success: function (data) {
            if (data.success) {
               /* let strSuccess = ` Уважаемый ${data.fio} , вы записались на ${data.date} на процедуру ${data.proceduraName} `;
                $(' #popup-window-content-ajaxPopup ').html(strSuccess);
                $('#ajaxPopup').find('#save-btn').css('display','none');*/
                // alert(strSuccess);
            }
            //$( ' #popup-window-content-ajaxPopup form#popup').html(strSuccess);
        }
    })


}
