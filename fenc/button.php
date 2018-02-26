<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<input type="submit" name="btn"  id="btn" value="submit" disabled/>

<input type="checkbox"  onchange="document.getElementById('btn').disabled = !this.checked"/>
</body>
</html>