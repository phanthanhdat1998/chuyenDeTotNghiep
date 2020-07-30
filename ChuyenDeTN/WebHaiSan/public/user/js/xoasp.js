function getCartAjax() {
    debugger;
    var cart = null;
    jQuery('.cart_header_top_box').html('');
    jQuery.getJSON('/cart.js', function(cart, txtStatus) {
        if (cart.item_count != 0) {
            jQuery('.cart_header_top_box').append('<div class="cart_box_wrap"></div>');
            jQuery.each(cart.items, function(i, item) {
                div = $('.original').clone().removeClass('original').appendTo('.cart_box_wrap');
                if (item.image != null)
                    div.find('.cart_item_image').html("<img src=" + Haravan.resizeImage(item.image, 'small') + " alt=" + item.product_title + ">");
                else
                    div.find('.cart_item_image').html("<img src='//hstatic.net/0/0/global/noDefaultImage6_large.gif'>");
                vt = item.variant_options;
                if (vt.indexOf('Default Title') != -1)
                    vt = '';
                div.find('.cart_item_info .cart_item_title a').html(item.product_title + '<span class="variant_title"> - ' + vt + '</span>').attr('href', item.url).attr('title', item.title);
                div.find('.cart_item_qty').html("x" + item.quantity);
                if (typeof(formatMoney) != 'undefined') {
                    div.find('.cart_item_price').html(Haravan.formatMoney(item.price, shop.moneyFormat));
                } else {
                    div.find('.cart_item_price').html(Haravan.formatMoney(item.price, shop.moneyFormat));
                }
                div.find('.remove').html("<a href='javascript:void(0);' onclick='deletecart(" + item.variant_id + ")' ><i class='fa fa-trash'></i></a>");
            });
            jQuery('.cart_header_top_box').append('<div class="cart_box_bottom"><div class="total_cart"><span>Tổng tiền: </span><span class="total_price">' + Haravan.formatMoney(cart.total_price, shop.moneyFormat) + '</span></div><a href="/cart" class="btn-minicart">Xem giỏ hàng</a></div>');
            jQuery('.cart-count').html(cart.item_count);
        } else {
            jQuery('.cart-count').html(cart.item_count);
            jQuery('.cart_header_top_box').html('<div class="cart_empty">Giỏ hàng của bạn vẫn chưa có sản phẩm nào.</div>');
        }
    });
}