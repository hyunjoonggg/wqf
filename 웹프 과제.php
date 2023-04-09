<?php
//1번 문제
$n = 30;
$sum = 0;
$prod = 1;
for($i = 1; $i <= $n; $i++) {
  echo $i . " "; 
  $sum += $i; 
  $prod *= $i; 
}
echo "<br>";
echo "1 + ... + 30 = " . $sum . "<br>"; 
echo "1 * ... * 30 = " . $prod; 
?> 


<?php
//2번 문제
$n = 30;


for ($i = 0; $i < $n; $i++) {
  $dada[$i] = rand(10, 100);
}


echo "생성된 정수: ";
foreach ($dada as $num) {
  echo $num . " ";
}


sort($dada);
echo "\n소팅한 결과: ";
foreach ($dada as $num) {
  echo $num . " ";
}
?>


<?php
//3번 문제
$n = readline("정수 n을 입력하세요: ");
$prev = 0;
$current = 1;

for ($i = 1; $i <= $n; $i++) {
  echo $current . " ";
  if ($i > 1) {
    $proportion = $current / $prev;
    echo $proportion . "\n";
  } else {
    echo "\n";
  }
  $next = $prev + $current;
  $prev = $current;
  $current = $next;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>도형 면적/체적 계산기</title>
</head>
<body>
	<h2>삼각형</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="base">밑변:</label>
		<input type="number" id="base" name="base"><br><br>
		<label for="height">높이:</label>
		<input type="number" id="height" name="height"><br><br>
		<input type="submit" name="submit1" value="계산하기">
	</form>

	<?php
    //4번 문제
	if (isset($_POST['submit1'])) {
		$base = $_POST['base'];
		$height = $_POST['height'];
		$area = $base * $height / 2;
		echo "<p>면적: $area</p>";
	}
	?>

	<h2>직사각형</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="width">가로:</label>
		<input type="number" id="width" name="width"><br><br>
		<label for="height2">세로:</label>
		<input type="number" id="height2" name="height2"><br><br>
		<input type="submit" name="submit2" value="계산하기">
	</form>

	<?php
	if (isset($_POST['submit2'])) {
		$width = $_POST['width'];
		$height2 = $_POST['height2'];
		$area = $width * $height2;
		echo "<p>면적: $area</p>";
	}
	?>

	<h2>원</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="radius">반지름:</label>
		<input type="number" id="radius" name="radius"><br><br>
		<input type="submit" name="submit3" value="계산하기">
	</form>

	<?php
	if (isset($_POST['submit3'])) {
		$radius = $_POST['radius'];
		$area = pi() * pow($radius, 2);
		echo "<p>면적: $area</p>";
	}
	?>

    <h2>직육면체</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label for="width3">가로:</label>
	<input type="number" id="width3" name="width3"><br><br>
	<label for="length2">세로:</label>
	<input type="number" id="length2" name="length2"><br><br>
	<label for="height5">높이:</label>
	<input type="number" id="height5" name="height5"><br><br>
	<input type="submit" name="submit7" value="계산하기">
    </form>


    <?php
    if (isset($_POST['submit7'])) {
	$width3 = $_POST['width3'];
	$length2 = $_POST['length2'];
	$height5 = $_POST['height5'];
	$area = 2 * ($width3 * $length2 + $length2 * $height5 + $height5 * $width3);
	echo "<p>면적: $area</p>";
    }
    ?>


    <h2>원통</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="radius2">반지름:</label>
		<input type="number" id="radius2" name="radius2"><br><br>
		<label for="height4">높이:</label>
		<input type="number" id="height4" name="height4"><br><br>
		<input type="submit" name="submit5" value="계산하기">
	</form>

    <?php
    if (isset($_POST['submit5'])) {
	$radius2 = $_POST['radius2'];
	$height4 = $_POST['height4'];
	$area = 2 * pi() * $radius2 * ($radius2 + $height4);
	echo "<p>면적: $area</p>";
    }
    ?>

    <h2>구</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label for="radius">반지름:</label>
	<input type="number" id="radius" name="radius"><br><br>
	<input type="submit" name="submit2" value="면적/체적 계산하기">
    </form>
    
    <?php
    if (isset($_POST['submit2'])) {
	$radius = $_POST['radius'];
	$surface_area = 4 * pi() * pow($radius, 2); 
	$volume = 4 / 3 * pi() * pow($radius, 3); 
	echo "<p>표면적: $surface_area</p>";
	echo "<p>체적: $volume</p>";
    }
    ?> 

<!DOCTYPE html>
<html>
<head>
    <title>달력</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
//5번 문제
function printCalendar($year, $month) {
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numOfDaysInMonth = date('t', $firstDayOfMonth);
    $dayOfWeek = date('w', $firstDayOfMonth);

    echo "<table>";
    echo "<tr><th>일</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th></tr>";
    for ($i = 1; $i <= 42; $i++) {
        if (($i < $dayOfWeek + 1) || ($i > $numOfDaysInMonth + $dayOfWeek)) {
            echo "<td>&nbsp;</td>";
        } else {
            $day = $i - $dayOfWeek;
            if ($day >= 1) {
                echo "<td>$day</td>";
            } else {
                echo "<td>&nbsp;</td>";
            }
        }
        if ($i % 7 == 0) {
            echo "</tr><tr>";
        }
    }
    echo "</tr></table>";
}

printCalendar(2001, 2);
?>

</body>
</html>