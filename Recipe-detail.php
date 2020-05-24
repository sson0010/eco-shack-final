<?php
global $wpdb;
global $result;
// get para value
$ID     = $_GET['ID'];
// base on id search recipe
$result = $wpdb->get_results("SELECT * FROM recipes where id = $ID");
foreach ($result as $print) {
    // show recipe detail
?>

<table class="table">
    <tbody>
        <tr>
            <td><h3><?php
    echo $print->recipeName;
?></h3></td> 
        </tr>
        <tr>
            <td colspan=2>
				<span style="font-family: Helvetica, sans-serif; font-size: 18px;">
					<?php
    echo $print->des;
?>
				</span>
			</td> 
        </tr>
        <tr> 
            <td width = '40%'><img src='<?php
    echo $print->image;
?>' /></td> 
            <td>
				<span style="font-family: Helvetica, sans-serif; font-size: 18px;">
					<H6>ingredients</H6><?php
    echo $print->ingredient;
?>
				</span>
			</td>
        </tr>
		<tr> 
            <td colspan=2>
				<span style="font-family: Helvetica, sans-serif; font-size: 18px;">
					<H6>directions</H6><?php
    echo $print->direction;
?>
				</span> 
			</td>
        </tr>
    </tbody>
</table>
<style>
table, th, td {
  border: none;
}
</style>
<?php
}
?>