<?php
require_once("../connection.php");
if(isset($_POST["actor_name"])&&isset($_POST["genders"])&& empty(trim($_POST["actor_name"]))){
    $actor_name=$_POST["actor_name"];
    $gender=$_POST["genders"];

}