<?php
$servername = "localhost:3306";
$username   = "bn_wordpress";
$password   = "50d094ca5b";
$dbname     = "bitnami_wordpress";
$array1     = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql    = "SELECT CountryName, round(sum(ValueInMtCO2)) AS TotalValue FROM `highestcarbonemission` group by CountryName order by sum(ValueInMtCO2) DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($array1, array(
            "CountryName" => $row["CountryName"],
            "TotalValue" => $row["TotalValue"]
        ));
    }
} else {
    echo "0 results";
}

//counting the length of the array
$countArrayLength = count($array1);

mysqli_close($conn);
?>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'CountryName');
    data.addColumn('number', 'TotalValue');

    data.addRows([

    <?php
for ($i = 0; $i < $countArrayLength; $i++) {
    echo "['" . $array1[$i]['CountryName'] . "'," . $array1[$i]['TotalValue'] . "],";
}
?>
    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Top 10 countries for Carbon Emission', 'width':800, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>