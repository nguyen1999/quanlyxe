$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('#scrollback').fadeIn();
        } else {
            $('#scrollback').fadeOut();
        }
    })
    $('#scrollback').click(function () {
        $('html,body').animate({ scrollTop: 0 }, 600);
    });
    // Sort by price
    $('#form-select-filter').change(function(e){
        var choose = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "/sort",
            type: 'GET',
            data: {
                choose:choose,
                _token: token
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            }
        }).done(function(res){  
            var imgSrc = "https://quanlyxe.lc/storage/images/cars/";
            var html = '';
            if(res.data.length > 0){
                for(let x of res.data){
                    html+= 
                    "<div class='col-lg-3 mb-4'><div class='product-item-box'><div class='product-item'><div class='image'><a href='/product/id/"+
                    x.id+"'><img src='"+imgSrc+x.image_path+"' width='100%' height='100%' name='product-image' class='product-image' /></a><a href=/product/id/"+
                    x.id+" class='more-info'><i class='fas fa-search'></i> XEM THÊM</a></div><a href='/product/id/"+
                    x.id+"' class='product-name mt-4'>"+x.name+"</a><div class='price-new' name='price-new'>"+x.hire_price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})+
                    " / ngày</div></div></div></div>";
                }
            }
            $('#product-container').html(html);
        });
    });
});