<?php

//file to connect with the data bases

require_once 'connect.php';

//oder the users if...
$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'lastname'){
		$order = ' ORDER BY lastname';
	}
	elseif($_GET['column'] = 'firstname'){
		$order = ' ORDER BY firstname';
	}
	elseif($_GET['column'] == 'birthdate'){
		$order = ' ORDER BY birthdate';
	}

	if($_GET['order'] == 'asc'){
		$order.= ' ASC';
	}
	elseif($_GET['order'] == 'desc'){
		$order.= ' DESC';
	}
}

//select all the users
$queryUsers = $db->prepare('SELECT * FROM users'. $order);
if($queryUsers->execute()){	
	$users = $queryUsers->fetchAll();
}

//check's for add a new user
if(!empty($_POST)){
    //array of errors
    $errors=[];

	foreach($_POST as $key => $value){
        //prevent injections
		$_POST[$key] = strip_tags(trim($value));
	}

	if(strlen($_POST['firstname']) < 3){
		$errors[] = 'Le prénom doit comporter au moins 3 caractères';
	}

	if(strlen($_POST['lastname']) < 3){
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
	}

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //validate email format
		$errors[] = 'L\'adresse email est invalide';
	}

	if(empty($_POST['birthdate'])){
		$errors[] = 'La date de naissance doit être complétée';
	}

	if(empty($_POST['city'])){
		$errors[] = 'La ville ne peut être vide';
	}
	if(count($errors) > 0){ 
        //if the array has errors return errors to display
		return $errors;
	}else{
		// if error = 0 = insertion user
	$insertUser = $db->prepare('INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)');
	$insertUser->bindValue(':gender', $_POST['gender']);
	$insertUser->bindValue(':firstname', $_POST['firstname']);
	$insertUser->bindValue(':lastname', $_POST['lastname']);
	$insertUser->bindValue(':email', $_POST['email']);
	$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($_POST['birthdate'])));
	$insertUser->bindValue(':city', $_POST['city']);
	if($insertUser->execute()){
		$createUser = true;
	} else {
        // if not insert in the data bases
		 $errors[] = 'Erreur SQL';
    }
}
}
?>
