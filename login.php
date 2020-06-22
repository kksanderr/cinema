<?php
	require_once('core/start.php');
	//$db = Database::connect();

	if(Input::exists('post')) {

		// validacija
		$validation = new Validate();

		$rules = [
			'email' => [
				'required' => true,
				'email' => true,
				/*'unique' => 'users'*/
			],
			'password' => [
				'required' => true,
			]
		];

		$validation->check($_POST, $rules);

		if($validation->passed()) {
			// login
			$user = new User();
			if($user->login(Input::get('email'), Input::get('password'))) {
				// redirekt
				Session::set('success', 'You are loged in');
				Redirect::to('profile.php');
			}
			else {
				Session::set('error', 'Login failed! Wrong email or password.');
			}

		}
		else {
			Session::set('errors', $validation->errors());
		}

	}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <div id="login-sidenav" class="login">
      <section class="container-sm">
        <div class="login-box">
          <div class="login-form">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNavLogin()">&times;</a>
            <h2>Prijavljivanje</h2>

             <form method="POST" action="">
              <p class="my-5">E-Mail adresa:</p>
              <input class="form-field mb-5" type="text" name="email">
              <p class="my-5">Šifra:</p>
              <input class="form-field mb-5" type="password" name="password">

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
