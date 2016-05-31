<?php
$errors = array();
$data = array();
// Getting posted data and decodeing json
$_POST = json_decode(file_get_contents('php://input'), true);

// checking for blank values.
if (empty($_POST['Name']))
    $errors['Name'] = 'Name is required.';

if (empty($_POST['Email']))
    $errors['Email'] = 'Username is required.';

if (empty($_POST['Mobile']))
    $errors['Mobile'] = 'Mobile is required.';

if (!empty($errors)) {
    $data['errors']  = $errors;
} else {
    $data['message'] = 'Form data is going well';
}
// response back.
echo json_encode($data);
?>