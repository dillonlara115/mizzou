<?php $pageTitle = 'Admin Dashboard'; include("includes/header.php"); ?>

<?php
if (isset($_POST['first_name'])) {
$name = strip_tags($_POST['first_name']);
echo "Name =".$name."</br>"; 
echo "<span class=\"label label-info\" >your message has been submitted .. Thanks you</span>";
}?>

<?php include("includes/footer.php"); ?>