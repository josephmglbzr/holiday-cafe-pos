<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Date Display</title>
    <script>
        // JavaScript code to display the current date
        function displayCurrentDate() {
            // Create a new Date object
            var currentDate = new Date();

            // Extract the components of the date
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // January is 0!
            var year = currentDate.getFullYear();

            // Format the date as desired (in this case, DD/MM/YYYY)
            var formattedDate = day + '/' + month + '/' + year;

            // Display the formatted date in the specified HTML element
            document.getElementById('currentDate').innerHTML = formattedDate;
        }
    </script>
</head>
<body onload="displayCurrentDate()">
    <!-- HTML element where the current date will be displayed -->
    <p>Today's Date: <span id="currentDate"></span></p>
</body>
</html>