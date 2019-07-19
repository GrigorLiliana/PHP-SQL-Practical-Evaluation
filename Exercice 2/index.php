<?php 
require_once 'instrutions.php'; 
//separate the php code / check's in other file to better organize the code
?>

<!DOCTYPE html>
<html>
<head>
<title>Exercice 1</title>
<meta charset="utf-8">
<!--Bootstrap style link--> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

	<h1>Liste des utilisateurs</h1>
	
	<p>Trier par : 

		<!-- Link's to order the users -->
		<a href="index.php?column=firstname&order=asc">Prénom (croissant)</a> |
		<a href="index.php?column=firstname&order=desc">Prénom (décroissant)</a> |
		<a href="index.php?column=lastname&order=asc">Nom (croissant)</a> |
		<a href="index.php?column=lastname&order=desc">Nom (décroissant)</a> |
		<a href="index.php?column=birthdate&order=desc">Âge (croissant)</a> |
		<a href="index.php?column=birthdate&order=asc">Âge (décroissant)</a>
	</p>
	<br>

<!-- Div to Display the User added or the errors -->
	<div class="row">
<?php
if(isset($createUser)){
echo '<div class="col-md-6 col-md-offset-3">';
echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
}
if(!empty($errors)){
echo '<div class="col-md-6 col-md-offset-3">';
echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
}
?>
</div>

<!-- Table to display the users -->
	<div class="col-md-7">
		<table class="table">
			<thead>
				<tr>
					<th>Civilité</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($users as $user):?>
				<tr>
					<td><?php echo $user['gender'];?></td>
					<td><?php echo $user['firstname'];?></td>
					<td><?php echo $user['lastname'];?></td>
					<td><?php echo $user['email'];?></td>
					<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y;?> ans</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- Form to add new user -->	
	<div class="col-md-5">

		<form method="post" class="form-horizontal well well-sm">
		<fieldset>
		<legend>Ajouter un utilisateur</legend>

			<div class="form-group">
			<label class="col-md-4 control-label" for="gender">Civilité</label>
			<div class="col-md-8">
				<select id="gender" name="gender" class="form-control input-md" required>
				<option value="Mlle">Mademoiselle</option>
					<option value="Mme">Madame</option><option value="M">Monsieur</option>
				</select>
		</div>
		</div>
			<div class="form-group">
			<label class="col-md-4 control-label" for="firstname">Prénom</label>
			<div class="col-md-8">
			<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
				</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="lastname">Nom</label>  
			<div class="col-md-8">
				<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
			</div>
		</div>

			<div class="form-group">
			<label class="col-md-4 control-label" for="email">Email</label>  
		<div class="col-md-8">
		<input id="email" name="email" type="email" class="form-control input-md" required>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-4 control-label" for="city">Ville</label>  
		<div class="col-md-8">
			<input id="city" name="city" type="text" class="form-control input-md" required>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-4 control-label" for="birthdate">Date de naissance</label>  
		<div class="col-md-8">
		<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
		<span class="help-block">au format JJ-MM-AAAA</span>  
		</div>
		</div>

		<div class="form-group">
		<div class="col-md-4 col-md-offset-4"><button type="submit" class="btn btn-primary">Envoyer</button></div>
		</div>
		</fieldset>
		</form>
	</div>
	<!-- End of the div form -->
</div>
</div>

</body>
</html>