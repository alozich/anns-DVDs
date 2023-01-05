<?php session_start(); ?>
<head>
    <title>Ann's DVD Collection</title>
    <link href="resources/index.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
		<div class="loginsignup">
			<a href='login.php'><button>Login</button></a>
		<a href='signup.php'><button>Sign Up</button></a>
		</div>
		<a href="https://compsci04.snc.edu/~loziac/csci322/annDVDs/"><h1>&#128253 Ann's DVD Collection &#128253</h1></a>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
	
	<div style="margin-top: 100px;">
		<h1>Account Successfully Made</h1>
		<h2>You are currently logged into this session.<h2>
	</div>
</body>

<?php
var_dump($_POST);
// oneUser.php ... creates an object via assignment and 
// and encodes as JSON, and writes to users.txt
require('user.php');

$fp = fopen("/home/loziac/public_html/csci322/annDVDs/users.txt", 'ab');
if (!$fp) { echo "<b> could not open file<p>"; exit; }

$email = $_POST['email'];

$file = file_get_contents("/home/loziac/public_html/csci322/annDVDs/users.txt");

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}

if(str_contains($file, $email))
{
	header("Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/signup.php?message=invalid");
	exit();
}

$userOne = new User();
$userOne->firstName = $_POST['firstName'];
$userOne->lastName = $_POST['lastName'];
$userOne->email = $_POST['email'];
$userOne->password = $_POST['password'];

$_SESSION['email'] = $userOne->email;
$_SESSION['firstName'] = $userOne->firstName;

echo $userOne->firstName;
echo $_SESSION['firstName'];


$json = json_encode($userOne);
fwrite ($fp, $json, strlen($json));
fwrite($fp, "\n", 1);
fclose($fp);

echo session_id();

header("Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/");
exit;

?>
