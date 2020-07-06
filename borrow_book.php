<?php
include 'connection.php';
session_start();

	$book_id = $_GET['book'];
	$student_id = $_GET['student'];

	date_default_timezone_set('Asia/Manila');
	$time = date('g:i:A');
	$date = date('Y-m-d');

	$insert = mysqli_query($conn, "insert into borrow_book(time_borrow,date_borrow,student_id,book_id,status) values ('$time','$date','$student_id','$book_id','Pending')");

	if($insert) {
		echo "<script>alert('Success');location.replace('book_borrowed.php');</script>";
	}
	else {
		echo "<script>alert('Error')</script>";
	}



?>

