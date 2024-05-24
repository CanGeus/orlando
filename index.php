<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Parking System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="parking-grid">
        <div class="parking-spot available" id="spot1">
            <div class="spot-number">1</div>
            <div id="status1">Available</div>
        </div>

        <div class="parking-spot available" id="spot2">
            <div class="spot-number">2</div>
            <div id="status2">Available</div>
        </div>
    </div>


    <script>
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

        function getdata() {
            fetch('data.json')
                .then(response => response.json())
                .then(data => {
                    updateSpotStatus(spot1, status1, data.park1);
                    updateSpotStatus(spot2, status2, data.park2);
                    console.log(data.park1);
                });
        }

        getdata();
        setInterval(getdata, 5000);
    </script>

</body>

</html>