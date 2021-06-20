<?php

include 'dbconfig.php';

$sql = "select
  YEAR(last_update) AS year, MONTH(last_update) AS month, COUNT(DISTINCT id) AS joins
from
  queue
where YEAR(last_update) = YEAR(CURDATE())
group by
  YEAR(last_update), MONTH(last_update)";
  
$result = mysqli_query($con, $sql);
$backgroundColor = "[]";
$data = array();
$labels = array();

if (mysqli_num_rows($result) == 1) {
                while($track = mysqli_fetch_assoc($result)) {
                   array_push($data, $track['joins']);
                   array_push($labels, date('F', mktime(0, 0, 0, $track['month']-1 , 10)));
                }
    
}
  
function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function js_array($array)
{
    $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}

  
?>
<script>

<?php echo 'var dataSet = ', js_array($data), ';'; ?>
<?php echo 'var labelSet = ', js_array($labels), ';'; ?>

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labelSet,
        datasets: [{
            label: '# of Vehicles',
            data: dataSet,
            backgroundColor: <?php echo $backgroundColor;?>,
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
    }
});
</script>