
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <script>
        function SEARCH(val) {
            if (val.length == 0) {
                document.getElementById("resu").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("resu").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "popUpDynamicSearch.php?search=" + val, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>
<form>
    Search: <input type="text" name="search" id="search" onkeyup="SEARCH(this.value)"><br>
    <button type="reset">reset</button>
</form>
<br>
<br>
<div>
    <span id="resu">
    </span>
</div>
</body>
</html>
