

function confirmOrder() {
    let deletedProducts = [];
    $('.delete input[type="checkbox"]:checked').each(function () {
        deletedProducts.push(this.value)
    })
    let name =  $('#name').val()
    let phone =  $('#phone').val()
    let tg =  $('#telegram').val()
    let promo =  $('#promo').val()
    $.ajax({
        url: "{{route('confirm-order')}}",
        type: "POST",
        data: {
            "_token": "{{csrf_token()}}",
            "deleted": deletedProducts,
            "name": name,
            "phone": phone,
            "promo": promo,
            "telegram": tg
        },
        success: (data) => {
            location.reload();
        },
        error: (err) => {
            if (err.status == 422) {
                $('.errors-valid').text('Укажите имя и номер телефона!')
                $('.errors-valid').addClass('errors-active')
            }
        }
    })
}
