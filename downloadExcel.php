<?php
include_once 'setSqlQuery.php';

$output = '';
$xls_filename = 'Library_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name

$sql = "SELECT * FROM $table_name ORDER BY $author";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	$output .= '
		<table class="table" bordered="1">
			<tr>
				<th>'.$isbn_no.'</th>
				<th>'.$name.'</th>
				<th>'.$author.'</th>
				<th>'.$publisher.'</th>
				<th>'.$print_date.'</th>
				<th>'.$date_received.'</th>
				<th>'.$volume.'</th>
				<th>'.$language.'</th>
				<th>'.$category.'</th>
				<th>'.$read.'</th>
				<th>'.$lend.'</th>
				<th>'.$lend_to.'</th>
			</tr>
	';
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>'.$row[$isbn_no].'</td>
				<td>'.$row[$name].'</td>
				<td>'.$row[$author].'</td>
				<td>'.$row[$publisher].'</td>
				<td>'.$row[$print_date].'</td>
				<td>'.$row[$date_received].'</td>
				<td>'.$row[$volume].'</td>
				<td>'.$row[$language].'</td>
				<td>'.$row[$category].'</td>
				<td>'.$row[$read].'</td>
				<td>'.$row[$lend].'</td>
				<td>'.$row[$lend_to].'</td>
			</tr>
	';
	}
	$output .= '</table>';

	// Convert to UTF-16LE
	$output = mb_convert_encoding($output, 'UTF-16LE', 'UTF-8'); 
	// Prepend BOM
	$output = "\xFF\xFE" . $output;

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=".$xls_filename);
	echo $output;
}

?>