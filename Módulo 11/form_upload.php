<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Upload</title>
	<meta charset="utf-8"/>
</head>
<body>
	<form  method="POST" action="upload.php" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>Arquivo:</td>
				<td><input type="file" name="arquivo" /></td>
			</tr>
			<tr>
				<td colspan=2>
					<input type="submit" name="submited" value="Enviar Arquivo"/></td>
			</tr>
		</table>
	</form>
</body>
</html>