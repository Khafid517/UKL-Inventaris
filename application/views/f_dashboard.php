<!DOCTYPE html>
<html>
  <head>
      <title>Cuti Online</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?= base_url('')?>/assets/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
          .parallax-container {
              height: 425px;
          }
          .efek {
              text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
          }
          section, footer {
              padding: 20px 0px; 
          }
          .pilih img{
              margin-top: 10px;
              width: 100%;
          }
          .card-panel {
              margin-top: 40px;
          }
      </style>


  </head>


  <body id="home" class="scrollspy">
      <!-- NAVBAR USER -->
      <div class="navbar-fixed">
      <nav class="pink lighten-2">
          <div class="container">
              <div class="nav-wrapper">
          <a href="<?= base_url('')?>Dashboard" data-target="sidenav" class="sidenav-trigger"><i class="material-icons" >menu</i></a>
          <a href="<?= base_url('')?>Dashboard" class="brand-logo"><i class="material-icons">bubble_chart</i>BORROW</a>
          <ul class="right hide-on-med-and-down">
             <li><a href="<?= base_url('')?>Dashboard/pinjam" >Peminjaman</a></li>
             <li><a href="<?= base_url('')?>Dashboard/histori" >Riwayat</a></li>
             <li><a href="<?= base_url('')?>Logout" class="waves-effect waves-grey btn white black-text"><i class="material-icons pink-text">power_settings_new</i></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <ul class="sidenav black-text" id="sidenav">
   <li style="margin-top:10px;" class="center"><img width=20% src="<?= base_url('')?>assets/img/logo.png"></li>
    <li><div class="divider"></div></li>
    <li><a href="<?= base_url('')?>Dashboard/pinjam" >Peminjaman</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?= base_url('')?>Dashboard/histori" >Riwayat</a></li>
    <li><div class="divider"></div></li>
  </ul>

  <div class="parallax-container">
      <div class="parallax"><img src="<?= base_url('')?>/assets/img/u.jpg"></div>
      <div class="container efek">
          <div class="row">
              <div class="col m2 push-m4"><img width=300px src="<?= base_url('')?>/assets/img/logo.png"></div>
          </div>
          <h3 class="center light white-text">Selamat Datang</h3>
      </div>
  </div>

<!-- MENU USER -->
  <section id="cuti" class="pink lighten-5 scrollspy">
    <div class="container">
      <div class="row">
           <h2 class="center white-text light">BORROW Skkuuyyy...! :)</h2>
        </div>
  </section>

  <section>
      <div class="container">
          <div class="row">
              <div class="card-panel col m6 pull-m1 center pilih">
                 <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?= base_url('')?>/assets/img/quser.jpg">
                 </div>
                 <div class="card-content">
                    <p><a href="<?= base_url('')?>Dashboard/pinjam" class="waves-effect waves-light btn pink lighten-3">Peminjaman</a></p>
              </div>
          </div>
          <div class="card-panel col m6 push-m1 center pilih">
                 <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?= base_url('')?>/assets/img/a.jpg">
                 </div>
                 <div class="card-content">
                    <p><a href="<?= base_url('')?>Dashboard/histori" class="waves-effect waves-light btn pink lighten-3">RIWAYAT</a></p>
              </div>
          </div>
          </div>
      </div>
  </section>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url('')?>/assets/js/materialize.min.js"></script>
    <script>
      const sideNav = document.querySelectorAll('.sidenav');
      M.Sidenav.init(sideNav);
      const parallax = document.querySelectorAll('.parallax');
      M.Parallax.init(parallax);
      const scroll = document.querySelectorAll('.scrollspy');
      M.ScrollSpy.init(scroll, {
          scrollOffset: 50
      })
    </script>
  </body>
</html>