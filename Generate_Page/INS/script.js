function generateRegistrationNumber() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    // Generate a registration number using a combination of prefix, timestamp, and random number
    const prefix = "REG";
    const timestamp = new Date().getTime();
    ACC
    const randomNum = Math.floor(Math.random() * 10000);

    const registrationNumber = $ { prefix } - $ { timestamp } - $ { randomNum };

    // Display the registration number
    document.getElementById("registrationNumber").innerText = Registration Number: $ { registrationNumber };
}