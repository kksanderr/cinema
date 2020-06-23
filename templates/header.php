<header class="header">
  <ul class="logo">
    <li> <a href="index.php"><img src="./img/logo.png" alt="Arthaus Kino"></a></li>
  </ul>

  <button class="burger">
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#ad0230" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
	</button>

  <ul class="header-menu">
    <li class="divider"></li>
    <li><a href="calendar.php">Kalendar</a></li>
    <li class="divider"></li>
    <li><a href="news.php">Vesti</a></li>
    <li class="divider"></li>
    <?php
	if(isset($user) && $user->isLoggedIn()) {
$html = <<<OUT
<li><a href="profile.php">{$user->data()->username}</a></li>
<li class="divider"></li>
<li><a href="#">New article</a></li>
<li class="divider"></li>
<li><a href="logout.php">Logout</a></li>
OUT;

} else {

$html = <<<OUT
<span onclick="openNavLogin()"><li><a href="#">Prijavljivanje</a></li></span>
<li class="divider"></li>
<span onclick="openNavSignup()"><li><a href="#">Registracija</a></li></span>
OUT;
}

echo $html;
?>

    <li class="divider"></li>
    <li class="dropdown-wrapper"><a href="about.php">O nama</a>
      <ul class="dropdown">
        <li class="dropdown-divider"></li>
        <li><a href="history.php">Istorija</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="team.php">Tim</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="contact.php">Kontakt</a></li>
        <li class="dropdown-divider"></li>
      </ul>
    </li>

  </ul>
</header>
