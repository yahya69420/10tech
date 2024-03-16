const cleaveCC = new Cleave("#ccnum", {
    creditCard: true,
    delimiter: "-",

    onCreditCardTypeChanged: function (type) {
        const cardTypeIcon = document.getElementById("card_type_icon");
        const cardTypeInput = document.getElementById("cardType");
        const cardColor = document.getElementById("cardColour");
            switch (type) {
                case "visa":
                    cardTypeIcon.className = "card-icon fab fa-cc-visa";
                    cardTypeInput.value = "visa";
                    cardColor.value = "#1a1f71"; // Visa color
                    break;
                case "mastercard":
                    cardTypeIcon.className = "card-icon fab fa-cc-mastercard";
                    cardTypeInput.value = "mastercard";
                    cardColor.value = "#eb001b"; // Mastercard color
                    break;
                case "amex":
                    cardTypeIcon.className = "card-icon fab fa-cc-amex";
                    cardTypeInput.value = "amex";
                    cardColor.value = "#2a2a2a"; // Amex color
                    break;
                case "discover":
                    cardTypeIcon.className = "card-icon fab fa-cc-discover";
                    cardTypeInput.value = "discover";
                    cardColor.value = "#ff6600"; // Discover color
                    break;
                case "diners":
                    cardTypeIcon.className = "card-icon fab fa-cc-diners-club";
                    cardTypeInput.value = "diners";
                    cardColor.value = "#0073b5"; // Diners Club color
                    break;
                case "jcb":
                    cardTypeIcon.className = "card-icon fab fa-cc-jcb";
                    cardTypeInput.value = "jcb";
                    cardColor.value = "#1f1f1f"; // JCB color
                    break;
                default:
                    cardTypeIcon.className = "card-icon";
                    cardTypeInput.value = "";
                    cardColor.value = "#000000"; // Default color
                    break;
            }
    }
});


const cleaveExp = new Cleave("#expmonth", {
    date: true,
    datePattern: ["m", "y"],
});

const cleaveCVV = new Cleave("#cvv", {
    numeral: true,
    numeralPositiveOnly: true,
    blocks: [4],
});