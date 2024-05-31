function generateRandomString(){
    var length = 10; // Change the length of the random string if needed
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; // Characters to include in the random string
    var randomString = "";
    for (var i = 0; i < length; i++) {
      var randomIndex = Math.floor(Math.random() * charset.length);
      randomString += charset[randomIndex];
    }
    document.getElementById("randomStringInput").value = randomString;
    event.preventDefault();
}