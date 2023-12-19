<?php
session_start();

$minAgeError = '';

if ($_SESSION['minAge'] > $_SESSION['age']) {
    $minAgeError = 'Du bist zu jung um dieses Auto zu fahren.';
    $_SESSION['minAgeError'] = $minAgeError;
}
if ($_POST['insuranceValue']=='')
{
    unset($_SESSION['insuranceValue']);
}
if ($_POST['extrasValue1']=='')
{
    unset($_SESSION['extrasValue1']);
}
if ($_POST['extrasValue2']=='')
{
    unset($_SESSION['extrasValue2']);
}
if ($_POST['extrasValue3']=='')
{
    unset($_SESSION['extrasValue3']);
}


if ($_POST['insuranceValue']<> '') {
    $_SESSION['insuranceValue'] = $_POST['insuranceValue'];
}
if ($_POST['extrasValue1'] <> '') {
    $_SESSION['extrasValue1'] = $_POST['extrasValue1'];
}
if ($_POST['extrasValue2'] <> '') {
    $_SESSION['extrasValue2'] = $_POST['extrasValue2'];
}
if ($_POST['extrasValue3'] <> '') {
    $_SESSION['extrasValue3'] = $_POST['extrasValue3'];
}
 exit();
?>