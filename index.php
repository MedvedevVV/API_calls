<html>
<head>
<script> 
function func_scr() {
  window.scrollTo(0,document.body.scrollHeight);
}
</script>
</head>
<body>
<?php require "auth.php";?> 
<form action="auth.php">
<input type="hidden" name="do"   value="logout" />
<button type="submit">Выход из системы</button>
</form>
<button type="button" onclick="func_scr()">Прокрутка вниз</button> 
<hr /> 
</body>
</html> 
<style> 
body {background: #dfeaf2; } 
h3 {font: 1.2em "Fira Sans", sans-serif;}
form {display: inline;}
button {
    background-color: #004c89;
    border: none;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
}
</style> 
<?php PHP_EOL ?>
