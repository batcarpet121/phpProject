//Password validation check for the account creation page

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitButton").addEventListener("click", function (event) {
        var password = document.getElementById("passwd").value;
        var validationMessages = isStrongPassword(password);

        if (validationMessages.length > 0) {
            alert("Password must meet the following criteria:\n" + validationMessages.join("\n"));
            event.preventDefault();
        }
    });

    function isStrongPassword(password) {
        let validationMessages = [];

        if (password.length < 8) {
            validationMessages.push("Password must be at least 8 characters long");
        }

        let hasUppercase = false;
        let hasDigit = false;
        let hasSpecialChar = false;

        for (let i = 0; i < password.length; i++) {
            let char = password.charAt(i);

            if (/\p{Lu}/u.test(char)) {
                hasUppercase = true;
            } else if (!isNaN(parseInt(char, 10))) {
                hasDigit = true;
            } else if (/\p{P}/u.test(char)) {
                hasSpecialChar = true;
            }
        }

        if (!hasUppercase) {
            validationMessages.push("Password requires at least one uppercase letter");
        }

        if (!hasDigit) {
            validationMessages.push("Password requires at least one digit");
        }

        if (!hasSpecialChar) {
            validationMessages.push("Password requires at least one special character");
        }

        return validationMessages;
    }
});