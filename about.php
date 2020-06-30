 <?php
  require_once('core/start.php');
  $db = Database::connect();


  // public function isAdmin() {
  //   $sql = "SELECT role FROM 'users' WHERE ?";
  //   $result = query($sql, $user->data()->username);
  //   echo $result;
  // }
  //
  // isAdmin();

// Your code here!
// $curl = curl_init();
//     curl_setopt ($curl, CURLOPT_URL, "http://www.omdbapi.com/?i=tt0060827&apikey=9bb1c226");
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     $output = curl_exec($curl);
//     // print_r($output);
//
//     $data = json_decode($output, true);
//     //json_last_error();
//     //print_r($data);
//     print_r($data["Title"]);
//     echo "<br>";
//     print_r($data["Year"]);
//     echo "<br>";
//     print_r($data["Poster"]);
//     curl_close($curl);


// echo date('Y-m-d H:i:s');
$a = $_GET["browser"];
echo $a;
$showings = new Showings();
echo "<pre>";
$res = $showings->show('2020-07-03');
print_r($res);
echo $res[2]['film_name'];

?>
<!DOCTYPE html>
<html>
<head>
<script>
function check(browser) {
  document.getElementById("answer").value=browser;
}
</script>
</head>
<body>

<p>What's your favorite browser?</p>
<?php echo "test"; ?>
<form>
<input type="radio" name="browser" onclick="check(this.value)" value="Internet Explorer" onchange="this.form.submit()">Internet Explorer<br>
<input type="radio" name="browser" onclick="check(this.value)" value="Firefox" onchange="this.form.submit()">Firefox<br>
<input type="radio" name="browser" onclick="check(this.value)" value="Opera" onchange="this.form.submit()">Opera<br>
<input type="radio" name="browser" onclick="check(this.value)" value="Google Chrome" onchange="this.form.submit()">Google Chrome<br>
<input type="radio" name="browser" onclick="check(this.value)" value="Safari" onchange="this.form.submit()">Safari<br>
<br>
Your favorite browser is: <input type="text" id="answer" size="20">
</form>

</body>
</html>
