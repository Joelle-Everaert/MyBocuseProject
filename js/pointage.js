let dateDiv = document.querySelector(".date");
let today = new Date();
var options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric"
};
dateDiv.innerHTML = today.toLocaleDateString(undefined, options);

let buttonAttendanceLeft = document.querySelector(".buttonAttendanceLeft");
let buttonAttendanceRight = document.querySelector(".buttonAttendanceRight");


buttonAttendanceLeft.addEventListener("click", function (e) {
    let securedTimeMorning = new FormData();
    securedTimeMorning.append("cleMorning", "secret");
    fetch("./php/sendingTime.php", {
            method: 'POST',
            body: securedTimeMorning
        })
        .then(response => response.text())
        .then(text => {
            buttonAttendanceLeft.innerHTML = today.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
        })
    securedTimeMorning = "";
});

buttonAttendanceRight.addEventListener("click", function (e) {
    let securedTimeEvening = new FormData();
    securedTimeEvening.append("cleEvening", "secret");
    fetch("./php/sendingTime.php", {
            method: 'POST',
            body: securedTimeEvening
        })
        .then(response => response.text())
        .then(text => {
            buttonAttendanceRight.innerHTML = today.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
        })
    securedTimeEvening = "";
});


