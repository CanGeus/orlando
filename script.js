function updateSpotStatus(spotElement, statusElement, spotData) {
    if (spotData === "on") {
        statusElement.textContent = "Not Available";
        spotElement.classList.remove("available");
        spotElement.classList.add("occupied");
    } else {
        statusElement.textContent = "Available";
        spotElement.classList.remove("occupied");
        spotElement.classList.add("available");
    }
}

let spot1 = document.getElementById("spot1");
let status1 = document.getElementById("status1");

let spot2 = document.getElementById("spot2");
let status2 = document.getElementById("status2");

fetch('data.json')
.then(response => response.json())
.then(data => {
    updateSpotStatus(spot1, status1, data.park1);
    updateSpotStatus(spot2, status2, data.park2);
    console.log(data.park1);
});



