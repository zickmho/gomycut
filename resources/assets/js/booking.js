/**
 * Created by RJG on 2018-01-24.
 */

function ServiceSelect(elem) {
    var service_type = elem.getAttribute('service');
    var value = elem.checked;
    if (value == true) {
        addBooking(service_type);
    } else {
        removeBooking(service_type);
    }
    $('.checkbox')[service_type - 1].setAttribute('checked', value);
    if (service_type == 1) {
        $('#request-service-type-senior').val(value);
    } else if (service_type == 2) {
        $('#request-service-type-junior').val(value);
    } else if (service_type == 3) {
        $('#request-service-type-beard').val(value);
    } else if (service_type == 4) {
        $('#request-service-type-kids').val(value);
    }
}

function addBooking(serviceType) {
    var booking_table = document.getElementById('booking-details');
    var valItem = $('.input-number')[serviceType - 1];
    var priceItem = $('.service-price')[serviceType - 1];
    var targetItem = booking_table.rows[serviceType - 1];
    var countCell = targetItem.cells[1];
    var priceCell = targetItem.cells[2];
    var price = priceItem.innerHTML.replace( /^\D+/g, '');
    countCell.innerHTML = valItem.value;
    priceCell.innerHTML = 'RM ' + (price * valItem.value);

    if (serviceType == 1) {
        $('#request-senior-count').val(valItem.value);
    } else if (serviceType == 2) {
        $('#request-junior-count').val(valItem.value);
    } else if (serviceType == 3) {
        $('#request-beard-count').val(valItem.value);
    } else if (serviceType == 4) {
        $('#request-kids-count').val(valItem.value);
    }
    calcTotalPrice();
}

function removeBooking(serviceType) {
    var booking_table = document.getElementById('booking-details');
    var valItem = $('.input-number')[serviceType - 1];
    var targetItem = booking_table.rows[serviceType - 1];
    var countCell = targetItem.cells[1];
    var priceCell = targetItem.cells[2];
    countCell.innerHTML = '0';
    priceCell.innerHTML = 'RM 0';
}

function calcTotalPrice() {
    var booking_table = document.getElementById('booking-details');
    var accountResult = document.getElementById('booking-account');
    var subtotalItem = accountResult.rows[0];
    var discountItem = accountResult.rows[1];
    var totalItem = accountResult.rows[2];
    var subtotalPrice = 0;
    var totalPrice = 0;

    subtotalItem.cells[1].innerHTML = 'RM 0';
    totalItem.cells[1].innerHTML = 'RM 0';

    for(var i = 0; i < booking_table.rows.length; i++) {
        var priceCell = booking_table.rows[i].cells[2];
        var price = priceCell.innerHTML.replace( /^\D+/g, '');
        subtotalPrice = parseFloat(subtotalPrice) + parseFloat(price);
    }

    subtotalItem.cells[1].innerHTML = 'RM ' + subtotalPrice;
    var disprice = discountItem.cells[1].innerHTML.replace( /^\D+/g, '');
    totalPrice = subtotalPrice - disprice;
    totalItem.cells[1].innerHTML = 'RM ' + totalPrice;

    $('#total-price').val(totalPrice);
    $('#request-price').val(subtotalPrice);
    $('#request-discount').val(disprice);
    //console.log($('#total-price').val());
}