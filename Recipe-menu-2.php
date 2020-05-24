<?php
global $wpdb;
global $result;
// get para value
$ID = $_GET['ID'];
// check para is null 
if (empty($ID)) {
    // do all infor query
    $result = $wpdb->get_results("SELECT * FROM recipes order by id");
} else {
    // do keyword query
    $result = $wpdb->get_results("SELECT * FROM recipes where Ingredient like '%$ID%' ");
}
$i = 0;
// loop recipe info
echo "<table class='tab'><tr > <td width ='33%'></td> <td width ='33%'></td> <td width ='33%'></td></tr>";
// error msg. when result is null
if ($result == null) {
    echo "<td colspan=3>  Oops, there are no recipes containing this ingredient.
		</td>";
}
foreach ($result as $print) {
    if ($i % 3 == 0) {
        echo "<tr>";
    }
    echo "<td> <center><a href = 'https://www.eco-shack.bike/recipe/?ID={$print->id}' >	
			 <img width = '95%' src={$print->sourceLink} /> </a>
			 </center>  
		</td>";
    
    if ($i % 3 == 2) {
        echo "</tr>";
    }
    $i++;
}
echo "</table>
<style>
table, th, td {
  border: none;
}
input{
  border: 1px solid;
	}
</style>";

?>