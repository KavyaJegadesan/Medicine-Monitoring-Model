function showData(index, data_location_id) {
    if (index.length == 0) {
        document.getElementById(data_location_id).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(data_location_id).value = this.responseText;
            }
        };
        xmlhttp.open("GET", "getBlockData.php?index=" + index, true);
        xmlhttp.send();
    }
}