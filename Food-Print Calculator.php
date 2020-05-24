<!-- Creating form for user input -->
<form action="https://www.eco-shack.bike/carbon-food-print-calculator/#resultAnchor" method="post">
<br> 
<b> Did you know that the environmental impact of different foods varies hugely? Changing individual food habits can make a big difference to individual footprint. Let's find out the climate impact of what you eat and drink, and try contributing to less carbon emissions. </b>
<br><br><br>
<b> What food do you like to eat? </b>
<!-- Creating dropdown for food choices -->
<select id="foodNameSelected" name="foodNameSelected" required onchange="enableButton()">
  <option value=""></option>
<!-- If user selects a value, storing that value after form is submitted. This is done for all values -->
  <option value="Almond milk" <?php
if ($_POST['foodNameSelected'] == "Almond milk")
    echo "selected='selected'";
?> >Almond milk</option>
  <option value="Apples" <?php
if ($_POST['foodNameSelected'] == "Apples")
    echo "selected='selected'";
?> >Apples</option>
  <option value="Banana" <?php
if ($_POST['foodNameSelected'] == "Banana")
    echo "selected='selected'";
?> >Banana</option>
  <option value="Beef" <?php
if ($_POST['foodNameSelected'] == "Beef")
    echo "selected='selected'";
?> >Beef</option>
  <option value="Berries & Grapes" <?php
if ($_POST['foodNameSelected'] == "Berries & Grapes")
    echo "selected='selected'";
?> >Berries & Grapes</option>
  <option value="Coffee" <?php
if ($_POST['foodNameSelected'] == "Coffee")
    echo "selected='selected'";
?> >Coffee</option>
  <option value="Cow milk" <?php
if ($_POST['foodNameSelected'] == "Cow milk")
    echo "selected='selected'";
?> >Cow milk</option>
  <option value="Dark Chocolate" <?php
if ($_POST['foodNameSelected'] == "Dark Chocolate")
    echo "selected='selected'";
?> >Dark Chocolate</option>
  <option value="Eggs" <?php
if ($_POST['foodNameSelected'] == "Eggs")
    echo "selected='selected'";
?> >Eggs</option>
  <option value="Fish" <?php
if ($_POST['foodNameSelected'] == "Fish")
    echo "selected='selected'";
?> >Fish</option>
  <option value="Lamb & Goat" <?php
if ($_POST['foodNameSelected'] == "Lamb & Goat")
    echo "selected='selected'";
?> >Lamb & Goat</option>
  <option value="Nuts inc. Peanut Butter" <?php
if ($_POST['foodNameSelected'] == "Nuts inc. Peanut Butter")
    echo "selected='selected'";
?> >Nuts inc. Peanut Butter</option>
  <option value="Oat milk" <?php
if ($_POST['foodNameSelected'] == "Oat milk")
    echo "selected='selected'";
?> >Oat milk</option>
  <option value="Oatmeal" <?php
if ($_POST['foodNameSelected'] == "Oatmeal")
    echo "selected='selected'";
?> >Oatmeal</option>
  <option value="Peas" <?php
if ($_POST['foodNameSelected'] == "Peas")
    echo "selected='selected'";
?> >Peas</option>
  <option value="Pork" <?php
if ($_POST['foodNameSelected'] == "Pork")
    echo "selected='selected'";
?> >Pork</option>
  <option value="Potatoes" <?php
if ($_POST['foodNameSelected'] == "Potatoes")
    echo "selected='selected'";
?> >Potatoes</option>
  <option value="Poultry" <?php
if ($_POST['foodNameSelected'] == "Poultry")
    echo "selected='selected'";
?> >Poultry</option>
  <option value="Rice" <?php
if ($_POST['foodNameSelected'] == "Rice")
    echo "selected='selected'";
?> >Rice</option>
  <option value="Shrimps" <?php
if ($_POST['foodNameSelected'] == "Shrimps")
    echo "selected='selected'";
?> >Shrimps</option>
  <option value="Soy milk" <?php
if ($_POST['foodNameSelected'] == "Soy milk")
    echo "selected='selected'";
?> >Soy milk</option>
  <option value="Soybeans" <?php
if ($_POST['foodNameSelected'] == "Soybeans")
    echo "selected='selected'";
?> >Soybeans</option>
  <option value="Tea" <?php
if ($_POST['foodNameSelected'] == "Tea")
    echo "selected='selected'";
?> >Tea</option>
  <option value="Tofu" <?php
if ($_POST['foodNameSelected'] == "Tofu")
    echo "selected='selected'";
?> >Tofu</option>
  <option value="Tomatoes" <?php
if ($_POST['foodNameSelected'] == "Tomatoes")
    echo "selected='selected'";
?> >Tomatoes</option>
  <option value="Wheat and Wheat Products" <?php
if ($_POST['foodNameSelected'] == "Wheat and Wheat Products")
    echo "selected='selected'";
?> >Wheat and Wheat Products</option>
  <option value="White chocolate" <?php
if ($_POST['foodNameSelected'] == "White chocolate")
    echo "selected='selected'";
?> >White chocolate</option>
</select>

<br> <br> 

<b> How often do you eat it?  </b>
<!-- Creating dropdown for frequency choices -->
<select id="freqSelected" name="freqSelected" required onchange="enableButton()" >
  <option value=""></option>
<!-- If user selects a value, storing that value after form is submitted. This is done for all values -->
  <option value="daily" <?php
if ($_POST['freqSelected'] == "daily")
    echo "selected='selected'";
?> >daily</option>
  <option value="1-2 times a week" <?php
if ($_POST['freqSelected'] == "1-2 times a week")
    echo "selected='selected'";
?> >1-2 times a week</option>
  <option value="3-5 times a week" <?php
if ($_POST['freqSelected'] == "3-5 times a week")
    echo "selected='selected'";
?> >3-5 times a week</option>
  <option value="twice a day" <?php
if ($_POST['freqSelected'] == "twice a day")
    echo "selected='selected'";
?> >twice a day</option>
</select>

<br> <br> 

<!-- Creating javascript function for enabling submit button. This is required to not allow form submission till both values are selected -->
<script type="text/javascript">
function enableButton()
{
    var foodNameSelected = document.getElementById('foodNameSelected');
    var SubmitButton = document.getElementById('SubmitButton');
    // enabling submit button
    SubmitButton.disabled = !(foodNameSelected.value);
}
</script>

<p> *All emission calculations are based on serving size for each food. </p>

<input type="submit" id="SubmitButton" name="SubmitButton" disabled/>
<br> <br> 
<a name="resultAnchor"></a>
<br> <br> <br> <br> <br> 
</form> 



<!-- Extracting data from DB for selected food choice and frequency -->
<?php

global $wpdb;
global $result;
// creating select query
$query              = "SELECT AnnualEmission, GroupingIndex, CategoryType from carboncalculator";
$selectedFoodOption = "";
$selectedFreqOption = "";
$selectedFoodOption = $selectedFoodOption . "'" . $_POST['foodNameSelected'] . "'";
$selectedFreqOption = $selectedFreqOption . "'" . $_POST['freqSelected'] . "'";
$query              = $query . " WHERE FoodName in (" . $selectedFoodOption . ")";
$query              = $query . " AND Frequency in (" . $selectedFreqOption . ")";

$result = $wpdb->get_results($query);

?>

<?php
if (isset($_POST['foodNameSelected'])) {
    echo "<table style='border:none;' style='width:100%'>
<tr>
	<td style='border:none;' style='width:50%' align='center'>";
}
?>

<!-- selecting different images based on food choice from form submission -->
<?php
if (isset($_POST['foodNameSelected'])) {
?>
<?php
    if ($_POST['foodNameSelected'] == "Almond milk") {
?> 
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/almond-milk.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Apples") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/apple-1.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Banana") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/banana-1.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Beef") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/beef-steak.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Berries & Grapes") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/grapes.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Coffee") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/coffee.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Cow milk") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/cow-milk.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Dark Chocolate") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/dark-chocolate.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Eggs") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/eggs-1.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Fish") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/fish-1.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Lamb & Goat") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/lamb-chop.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Nuts inc. Peanut Butter") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/nuts.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Oat milk") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/oat-milk.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Oatmeal") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/oats.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Peas") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/peas.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Pork") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/pork-sausage.jpg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Potatoes") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/potato.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Poultry") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/chicken.jpg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Rice") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/rice.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Shrimps") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/shrimps.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Soy milk") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/soy-milk.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Soybeans") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/soybeans.jpeg" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Tea") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/tea.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Tofu") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/tofu.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Tomatoes") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/tomato0.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "Wheat and Wheat Products") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/wheat.png" width="200" height="200"> <br> 
<?php
    } else if ($_POST['foodNameSelected'] == "White chocolate") {
?>
<img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/white-chocolate.jpeg" width="200" height="200"> <br> 
<?php
    }
?>

<?php
    if (isset($_POST['foodNameSelected'])) {
        echo "</td>
	<td style='border:none;' style='width:50%' align='center'>";
    }
?>

<!-- Displaying car gif for kms driven -->
<?php
    if (isset($_POST['foodNameSelected'])) {
?>
    <img src="https://www.eco-shack.bike/wp-content/uploads/2020/05/car-clipart-gif-1.gif" width="200" height="200"> <br>
<?php
    }
?>

<?php
    if (isset($_POST['foodNameSelected'])) {
        echo "
	</td>
</tr>
<tr>
	<td style='border:none;' style='width:50%'>";
    }
?>

<b> <?php
    echo $_POST['foodNameSelected'];
?> </b> if consumed <b> <?php
    echo $_POST['freqSelected'];
?> </b> will result in your Annual CO2 emission to be 
<?php
}
?>

<!-- Displaying annual emission value for selected food and frequency -->
  <?php
foreach ($result as $value) {
?>
   <b> <?php
    echo $value->AnnualEmission;
?> kg </b> <br>
   <?php
    $selectedGrouping = $value->GroupingIndex;
?> 
   <?php
    $selectedCategoryType = $value->CategoryType;
?> 
  <?php
}
?>

<?php
if (isset($_POST['foodNameSelected'])) {
    echo "</td>
	<td style='border:none;' style='width:50%'>";
}
?>

<!-- Converting annual emission into kms driven -->
  <?php
foreach ($result as $value) {
?>
   The same amount of CO2 emission will occur if you drive 
   <b> <?php
    echo round(($value->AnnualEmission / 8.887) * 22 * 1.609);
?> Km </b> (assuming average fuel efficiency as 22 miles per gallon)
  <?php
}
?>

<?php
if (isset($_POST['foodNameSelected'])) {
    echo "</td>
</tr>
</table>";
}
?>

<!-- showing food data for same group -->
<?php

// initializing values
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

// creating select query 
$query              = "SELECT FoodName, AnnualEmission from carboncalculator";
$selectedFoodOption = "";
$selectedFreqOption = "";
$selectedFoodOption = $selectedFoodOption . "'" . $_POST['foodNameSelected'] . "'";
$selectedFreqOption = $selectedFreqOption . "'" . $_POST['freqSelected'] . "'";
$query              = $query . " WHERE Frequency in (" . $selectedFreqOption . ")";
$query              = $query . " AND GroupingIndex in (" . $selectedGrouping . ")" . " ORDER BY AnnualEmission DESC";

// creating result for query 
$result = mysqli_query($conn, $query);

// selecting each row from result dataset 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($array1, array(
            "FoodName" => $row["FoodName"],
            "Annual Emission" => $row["AnnualEmission"]
        ));
    }
}
//else 
//{
//    echo "0 results";
//}

//counting the length of the array
$countArrayLength = count($array1);
?>

<?php
if (isset($_POST['foodNameSelected'])) {
?>
<br><br>
Graph for showing comparison of different foods under your selected food category - <b> <?php
    echo $selectedCategoryType;
?> </b>

<div id="barchart"></div>
<?php
}
?>

<!-- Creating google charts visualization -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'FoodName');
    data.addColumn('number', 'Annual Emission');

    data.addRows([

    <?php
for ($i = 0; $i < $countArrayLength; $i++) {
    echo "['" . $array1[$i]['FoodName'] . "'," . $array1[$i]['Annual Emission'] . "],";
}
?>
    ]);

  var view = new google.visualization.DataView(data);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Total Annual CO2 emission in Kg', 'width':1200, 'height':600, legend: { position: "none" }};

  // Display the chart inside the <div> element with id="barchart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(view, options);
}
</script>
