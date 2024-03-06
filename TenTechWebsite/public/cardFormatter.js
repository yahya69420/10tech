const cleaveCC = new Cleave("#card_number", {
    creditCard: true,
    delimiter: "-",
    onCreditCardTypeChanged: function (type) {
        const cardType = document.getElementById("card_type");
        const cardTypeInput = document.getElementById("cardType");
        const cardColor = document.getElementById("cardColour");
        let visa = "fab fa-cc-visa";
        let mastercard = "fab fa-cc-mastercard";
        let amex = "fab fa-cc-amex";
        let discover = "fab fa-cc-discover";
        let diners = "fab fa-cc-diners-club";
        let jcb = "fab fa-cc-jcb";
        let color;

        switch (type) {
            case "visa":
                cardType.className = visa;
                cardTypeInput.value = "visa";
                cardColor.value = "#1a1f71"; // Visa color
                color = "#1a1f71"; // Visa color
                break;
            case "mastercard":
                cardType.className = mastercard;
                cardTypeInput.value = "mastercard";
                cardColor.value = "#eb001b"; // Mastercard color
                color = "#eb001b";  // Mastercard color
                break;
            case "amex":
                cardType.className = amex;
                cardTypeInput.value = "amex";
                cardColor.value = "#2a2a2a"; // Amex color
                color = "#2a2a2a";  // Amex color
                break;
            case "discover":
                cardType.className = discover;
                cardTypeInput.value = "discover";
                cardColor.value = "#ff6600"; // Discover color
                color = "#ff6600";  // Discover color
                break;
            case "diners":
                cardType.className = diners;
                cardTypeInput.value = "diners";
                cardColor.value = "#0073b5"; // Diners Club color
                color = "#0073b5";  // Diners Club color
                break;
            case "jcb":
                cardType.className = jcb;
                cardTypeInput.value = "jcb";
                cardColor.value = "#1f1f1f"; // JCB color
                color = "#1f1f1f";  // JCB color
                break;
            default:
                cardType.className = "";
                cardTypeInput.value = "";
                cardColor.value = "#000000"; // Default color
                color = "#000000";  // Default color
                break;
        }
        cardType.style.color = color;
        cardTypeInput.style.color = color;
        cardColor.style.color = color;
    },
});


const cleaveExp = new Cleave("#expiry_date", {
    date: true,
    datePattern: ["m", "y"],
});

const cleaveCVV = new Cleave("#cvv", {
    numeral: true,
    numeralPositiveOnly: true,
    blocks: [4],
});