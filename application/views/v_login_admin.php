<!DOCTYPE html>
  <html>
    <head>
  	    <title>Login</title>
  	    <!--Import Google Icon Font-->
  	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	    <!--Import materialize.css-->
  	    <link type="text/css" rel="stylesheet" href="<?= base_url('')?>assets/css/materialize.min.css"  media="screen,projection"/>

  	    <!--Let browser know website is optimized for mobile-->
  	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  	    <style type="text/css">
        body {
          background-image: url("<?= base_url('')?>assets/img/quser.jpg");
          background-size: cover;
        }
        .ikon {
          margin-top: 125px;
        }
        footer {
            margin-top: 120px;
          }

  	    </style>
    </head>


    <body>

      <section>
        <div class="container">
            <div class="row">
              <h5 class="center ikon"><i class=" material-icons large white-text">account_circle</i></h5>
              <h5 class="center white-text">ADMIN</h5>
              <div class="col m4 push-m4 s12 ">
                  <form action="<?= base_url('')?>index.php/Admin/login" method="post">
                      <div class="card-panel center ">
                          <div class="input-field">
                              <i class="material-icons prefix pink-text text-lighten-3">mail_outline</i>
                              <input id="email" type="email" class="validate" name="email" required>
                              <label for="email">E-mail</label>
                              <span class="helper-text" data-error="Belum" data-success=""></span>
                          </div>
                          <div class="input-field">
                              <i class="material-icons prefix pink-text text-lighten-3">lock_outline</i>
                              <input id="password" type="password" class="validate" name="pass" required>
                              <label for="password">Kata Sandi</label>
                              <span class="helper-text" data-error="Belum" data-success=""></span>
                          </div>
                          <button type="submit" class="waves-effect waves-light btn pink lighten-3">MASUK</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
      </section>
      <script type="text/javascript" src="<?= base_url('')?>assets/js/materialize.min.js"></script>
      <script>
      </script>
    </body>
  </html>