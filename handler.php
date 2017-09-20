<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:40
 */

require_once('lib/CallbackForm.php');
require_once('lib/EmailCallBack.php');
require_once('lib/Helper.php');

$name = Helper::getPostParam('name');
//$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$file = isset($_FILES['file']['name']) ? trim($_FILES['file']['name']) : '';
$formType = isset($_POST['formType']) ? trim($_POST['formType']) : '';

if ($formType === 'callback') {
    $form = new CallbackForm($name, $phone);
} else {
    $form = new EmailCallBack($name, $phone, $email, $file);
}

if ($form->validate()) {
    $form->send();
} else {
    echo 'Введите корректные данные';
}






