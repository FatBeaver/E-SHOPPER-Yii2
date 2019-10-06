/*price range*/

$('#sl2').slider();

$(".catalog").accordion({
    active: 0,
    collapsible: true
});

function showCart(cart) {
    $('#product-cart-id .modal-body').html(cart);
    $('#cart-count').text();
    $('#product-cart-id').modal();
}

function editCart(cart) {
    $('#cart-count').html('<i class="fa fa-shopping-cart"></i> Cart ' + cart);
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res) {
            showCart(res);
        }
    });
    return false;
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res) {
            showCart(res);
        }
    });
}

$('#product-cart-id .modal-body').on('click', '.cart_quantity_delete', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete-item',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка.Неудалось очистить корзину');
            showCart(res);
        },
        error: function() {
            alert("Ошибка.Не удалось удалить товар из корзины");
        }
    });
});

/////////////////////////////////////////////////////////////////////
function editCartValue(res, id) {
    $('.cart-' + id).val(res);
}


$('#product-cart-id .modal-body').on('click', '.cart_quantity_up', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/cart-plus',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка.Неудалось очистить корзину');
            //editCartValue(res, id);
            showCart(res);
        },
        error: function() {
            alert("Ошибка.Не удалось убрать экземпляр товара");
        }
    });
});

$('#product-cart-id .modal-body').on('click', '.cart_quantity_down', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/cart-minus',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка.');
            //editCartValue(res, id);
            showCart(res);
        },
        error: function() {
            alert("Ошибка.Не удалось убрать экземпляр товара");
        }
    });
});
//////////////////////////////////////////////////////////////////////////


$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    $.ajax({
        url: '/cart/editicon',
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка.Неудалось очистить корзину');
            editCart(res);
        },
    });
});

$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('#qty').val();
    $.ajax({
        url: '/cart/add',
        data: { id: id, qty: qty },
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert("Ошибка.Неверный идентификатор товара");
                return false;
            }
            showCart(res);
        },
        error: function() {
            alert("Ошибка добавления товара в корзину");
        }
    });
});
////////////////////////////////////////////////////////////////////////////
$('.add-to-review').on('click', function(e) {
    e.preventDefault();
    var text = $('#review_textarea').val();
    var id = $(this).data('id');
    $.ajax({
        url: '/product/write-review',
        data: { text: text, id: id },
        type: "POST",
        success: function(result) {
            if (!result) {
                alert("Ошибка добавления отзыва :(");
                return false;
            }
            showReviews(result);
        },
        error: function() {
            alert("Ляяя сори, ошибка(((");
        }
    });
});

function showReviews(res) {
    $('.ajax-reviews').html(res);
}


var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});