<?php
$connect = mysqli_connect("", "", "", "");
mysqli_set_charset($connect, "utf8");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM table_name
	WHERE col_name LIKE  '%".$search."%' ORDER BY record_id
		";
}
else
{
	$query = "
	SELECT * FROM table_name ORDER BY col_name LIMIT 0";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 1)
{
	$output .= '<div class="table-responsive"  >
					<table class="table table bordered text-nowrap">
						<tr>
							<th>col1</th>
							<th>col2</th>
							<th>col3</th>
							<th>col4</th>

							
							
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["col1"].'</td>
				<td>'.$row["col2"].'</td>
				<td>'.$row["col3"].'</td>
				<td>'.$row["col4"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo '';
}
?>
