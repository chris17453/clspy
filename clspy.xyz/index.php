<?
require_once $_SERVER['DOCUMENT_ROOT']."/class/init.php";
require_once $_SERVER['DOCUMENT_ROOT']."/views/header.php";

require_once $_SERVER['DOCUMENT_ROOT']."/views/searchForm.php";
if(isset($_POST['cat'])) {
    require_once $_SERVER['DOCUMENT_ROOT']."/class/buildResults.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/views/results.php";
}
require_once $_SERVER['DOCUMENT_ROOT']."/views/footer.php";