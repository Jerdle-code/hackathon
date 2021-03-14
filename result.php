<!DOCTYPE html>
<html>
<body>

<h1>Your Carbon Footprint</h1>

<?php
$co2_per_mile = array("smallpetrol"=>0.23877, "mediumpetrol"=>0.30029, "largepetrol"=>0.44752, "SUVpetrol"=>0.35156, "smalldiesel"=>0.22082, "mediumdiesel"=>0.26775, "largediesel"=>0.32863, "SUVdiesel"=>0.30805, "smallhybrid"=>0.16538, "mediumhybrid"=>0.17216, "largehybrid"=>0.23304, "SUVhybrid"=>0.31837, "smallelectric"=>0, "mediumelectric"=>0, "largeelectric"=>0, "SUVelectric"=>0);
$car_type = $_POST["car-size"] . $_POST["car-fuel"];
$car_co2 = $co2_per_mile[$car_type] * $_POST["miles"] * (365.2425/7);

$co2_electric = $_POST["electric"] * (0.23314+0.02005) * (365.2425/7);
$co2_gas = $_POST["gas"] * 2.02266 * 12;
$co2_coal = $_POST["coal"] * 2883.26;
$fuel_co2 = $co2_electric + $co2_gas + $co2_coal;

$flight_co2 = $_POST["flights"]*1.6093844*0.19085*$_POST["flight-distance"];

$total_co2 = $car_co2 + $fuel_co2 + $flight_co2;

echo "Your carbon footprint is " . $total_co2 . "kg CO<sub>2</sub>e/yr.";

$max_co2 = max($car_co2, $fuel_co2, $flight_co2);
if($max_co2 == $car_co2){
    echo "Either reduce your travel or buy a less polluting car. Electric vehicles can be zero-emissions, and public transport is generally lower-emissions than cars."
} else if ($max_co2 == $fuel_co2){
    echo "Use cleaner fuel and heating. Electricity is better than gas and coal."
} else {
    echo "Take fewer flights."
}
?>

</body>
</html>