<?php
	require("DatabaseConection.php");
	require("function.php");

	$data = array();
	$output = array();

	$start = isset($_POST['start']) ? intval($_POST['start']) : 0;														//get value of page
	$length = isset($_POST['length']) ? intval($_POST['length']) : 10;													//get value of records

	$searchValue = isset($_POST['search']['value']) ? $mysqli->real_escape_string($_POST['search']['value']) : '';		//get searched content

	$query = "SELECT * FROM `users` WHERE 1";																			//get data(query) for searched data

	if (!empty($searchValue)) {																							//query for search data
		$query .= " AND (firstname LIKE '%$searchValue%' 
					OR lastname LIKE '%$searchValue%' 
					OR email LIKE '%$searchValue%' 
					OR age LIKE '%$searchValue%')";
	}

	$filteredResult = $mysqli -> query($query);																			//get all filtered records
	$recordsFiltered = $filteredResult -> num_rows;

	$query .= " LIMIT $start, $length";																					//set navbar table
	$result = $mysqli->query($query);

	$total = $mysqli -> query("											
		SELECT COUNT(*) as total FROM users
	");

	$TotalRow = $total->fetch_assoc();																					//get all data(not filtred)
	$TotalRecords = $TotalRow['total'];

	while ($row = $result -> fetch_assoc()) {
		$image = '';
		if ($row['img'] != '') {
			$image = "<a href='upload/" . $row['img'] . "' id='center' target='_blank'>
						<img src='upload/" . $row['img'] . "' width='40' height='40' style='border-radius: 50%;'>
					</a>";
		}

		$SubArray = array();
		$SubArray[] = $image;
		$SubArray[] = $row['firstname'];
		$SubArray[] = $row['lastname'];
		$SubArray[] = $row['email'];
		$SubArray[] = $row['age'];
		$SubArray[] = '<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-warning btn-xs update">ویرایش</button>';
		$SubArray[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete" data-bs-toggle="modal" data-bs-target="#deleteModal">حذف</button>';
		$data[] = $SubArray;
	}

	$output = [
		"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 1,
		"recordsTotal" => $TotalRecords,
		"recordsFiltered" => $recordsFiltered,
		"data" => $data
	];

	echo json_encode($output);