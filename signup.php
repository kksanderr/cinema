<?php
require_once('core/start.php');

if(Input::exists('post')) {
	// validacija
	$validation = new Validate();
	$validation->check($_POST, [
			'username' => [
				'required' => true,
				'min' => 2,
				'max' => 60,
				'unique' => 'users'
			],

			'password' => [
				'required' => true,
				'min'=> 6
			],

			'retype' => [
				'required' => true,
				'matches' => 'password'
			],

			'email' => [
				'required' => true,
				'email'	=> true,
				'unique' => 'users'
			]

		]);

	if ($validation->passed()) {

		// registracija korisnika
			$user = new User();
			$data = [
				NULL,
				Input::get('username'),
				Input::get('email'),
				Hash::make(Input::get('password')),
				'user', // user role
				date('Y-m-d H:i:s'), // created_at
				date('Y-m-d H:i:s') // updated_at
			];

			$user->create($data);
			// redirekt
		Session::set('success', 'You have been registered and can now loged in');
		Redirect::to('login.php');

	} else {
		Session::set('errors', $validation->errors());
	}

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <div id="signup-sidenav" class="signup">
      <section class="container-sm">
      <div class="login-box">
      	<div class="login-form">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNavSignup()">&times;</a>
      		<h2>Registracija</h2>

      		<form method="POST" action="">
      			<p class="my-5">Korisničko ime:</p>
      			<input class="form-field mb-5" type="text" name="username">

      			<p class="my-5">E-Mail adresa:</p>
      			<input class="form-field mb-5" type="text" name="email">

      			<p class="my-5">Šifra:</p>
      			<input class="form-field mb-5" type="password" name="password">

      			<p class="my-5">Ponovi šifru:</p>
      			<input class="form-field mb-5" type="password" name="retype">

      			<div class="submit-btn">
      				<button class="btn">Pošalji</button>
      			</div>
      		</form>

      	</div>
      </div>
      </section>

			<section class="container-sm">
				<div class="messages">
					<div class="mt-5">
						<?php include('./templates/messages.php'); ?>
					</div>
				</div>
			</section>
			
    </div>
  </body>
</html>
