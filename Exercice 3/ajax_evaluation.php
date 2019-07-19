<?php

$errors = array();


if(!empty($_POST)){

    foreach($_POST as $key => $value){
        //prevent injections
		$_POST[$key] = strip_tags(trim($value));
    }
    
        //Basics validations
        if(empty($_POST['brand'])){
            $errors[] = 'Car *Brand* is mandatory';
        }

        if(empty($_POST['model'])){
            $errors[] = 'Car *Model* is mandatory';
        }
        if(empty($_POST['year'])){
            $errors[] = 'Car *Year* is mandatory';
        }
        if(empty($_POST['color'])){
            $errors[] = 'Car *Color* is mandatory';
        }

        //display errors if exists 
    if(count($errors)>0){
       echo implode(' *', $errors);
    }else{
        // If no errors, insert into DB
        require_once "connect.php";
        
        //prepare the query
        $query = 'INSERT INTO vehicles (brand, model, year, color) VALUES(?, ?, ?, ?);';
        $insertPrepare = $db->prepare($query);
        $insertPrepare->bindValue(1, $_POST['brand']);
        $insertPrepare->bindValue(2, $_POST['model']);
        $insertPrepare->bindValue(3, $_POST['year']);
        $insertPrepare->bindValue(4, $_POST['color']);

        //execute the query
        if($insertPrepare->execute()){
            echo 'Car successfully added!';
        }else{
            echo 'Invalid Car, try to insert other car please.';
        }
    }
}

