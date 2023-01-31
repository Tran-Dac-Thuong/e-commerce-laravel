let cardError = document.getElementById("card_error");
let cvvError = document.getElementById("cvv_error");
let monthError = document.getElementById("month_error");
let yearError = document.getElementById("year_error");
let alert_message = document.getElementById("alert_message");
let discountError = document.getElementById("dis_error");
let discountError2 = document.getElementById("dis_error_2");
function Card() {
    let card = document.getElementById("card").value;
    let visa = 4242424242424242;
    if (card.length == 0) {
        cardError.innerHTML = "Card number is required";
        return false;
    }
    if (isNaN(card)) {
        cardError.innerHTML = "Card number must be a number";
        return false;
    }
    if (card != visa) {
        cardError.innerHTML = "Card number is incorrect";
        return false;
    }
    cardError.innerHTML = '<i class="fa fa-check-circle"></i>';
    return true;
}
function Cvv() {
    let cvv = document.getElementById("cvv").value;
    if (cvv.length == 0) {
        cvvError.innerHTML = "Cvv is required";
        return false;
    }
    if (isNaN(cvv)) {
        cvvError.innerHTML = "Cvv must be a number";
        return false;
    }
    if (cvv.length < 3 || cvv.length > 3) {
        cvvError.innerHTML = "Cvv must have 3 digits";
        return false;
    }
    cvvError.innerHTML = '<i class="fa fa-check-circle"></i>';
    return true;
}

function Month() {
    let month = document.getElementById("expiration_month").value;
    if (month.length == 0) {
        monthError.innerHTML = "Expiration month is required";
        return false;
    }
    if (isNaN(month)) {
        monthError.innerHTML = "Expiration month must be a number";
        return false;
    }
    if (month < new Date().getMonth()) {
        monthError.innerHTML = "Expiration month can't be in the past";
        return false;
    }
    if (month < 1 || month > 12) {
        monthError.innerHTML = "Expiration month from january to december";
        return false;
    }
    monthError.innerHTML = '<i class="fa fa-check-circle"></i>';
    return true;
}

function Year() {
    let year = document.getElementById("expiration_year").value;
    if (year.length == 0) {
        yearError.innerHTML = "Expiration year is required";
        return false;
    }
    if (isNaN(year)) {
        yearError.innerHTML = "Expiration year must be a number";
        return false;
    }
    if (year < new Date().getFullYear()) {
        yearError.innerHTML = "Expiration year can't be in the past";
        return false;
    }
    yearError.innerHTML = '<i class="fa fa-check-circle"></i>';
    return true;
}

function Amount() {
    let amount = document.getElementById("amount").value;
    if (amount === "0") {
        alert_message.style.display = "block";
        return false;
    }
    return true;
}

function Submit() {
    if (!Card() || !Cvv() || !Month() || !Year() || !Amount()) {
        return false;
    }
}

function Discount() {
    let discount_input = document.getElementById("discount_input").value;
    if (discount_input.length == 0) {
        discountError.innerHTML = "Email is required";
        return false;
    }
    if (!discount_input.match(/^\w+[@]\w+[.]\w{3}$/)) {
        discountError.innerHTML = "@gmail.com";
        return false;
    }

    discountError.innerHTML = "";
    return true;
}

function Subscribe() {
    if (!Discount()) {
        return false;
    }
}

function Discount2() {
    let discount_input_2 = document.getElementById("discount_input_2").value;
    if (discount_input_2.length == 0) {
        discountError2.innerHTML = "Email is required";
        return false;
    }
    if (!discount_input_2.match(/^\w+[@]\w+[.]\w{3}$/)) {
        discountError2.innerHTML = "@gmail.com";
        return false;
    }

    discountError2.innerHTML = "";
    return true;
}

function Subscribe2() {
    if (!Discount2()) {
        return false;
    }
}
