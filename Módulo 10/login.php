<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8"/>
</head>
<body>
	<form method="POST" action="session.php">
		<table align="center">
			<tr>
				<td>Login:</td>
				<td><input type="text" name="user_login"/></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="user_pass"/></td>
			</tr>
			<tr>
				<td colspan=2><input type="submit" name="submited" value="Logar"/></td>
			</tr>
		</table>
	</form>
</body>
</html>