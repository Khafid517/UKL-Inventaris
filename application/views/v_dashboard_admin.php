<!DOCTYPE html>
<html>
  <head>
    <title>Admin Peminjaman</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= base_url('')?>assets/css/materialize.min.css"  media="screen,projection"/>

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

  <div class="navbar-fixed">
      <nav class="pink lighten-2">
          <div class="container">
              <div class="nav-wrapper">
          <a href="<?= base_url('')?>Admin_dashboard" data-target="sidenav" class="sidenav-trigger"><i class="material-icons" >menu</i></a>
          <a href="<?= base_url('')?>Admin_dashboard" class="brand-logo"><i class="material-icons">bubble_chart</i>BORROW</a>
          <ul class="right hide-on-med-and-down">
             <li><a href="<?= base_url('')?>Admin_dashboard/user" >Pengguna</a></li>
             <li><a href="<?= base_url('')?>Admin_dashboard/peminjaman" >Peminjaman</a></li>
             <li><a href="<?= base_url('')?>Admin_dashboard/barang" >Barang</a></li>
             <li><a href="<?= base_url('')?>Admin_logout" class="waves-effect waves-grey btn white black-text"><i class="material-icons pink-text">power_settings_new</i></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <ul class="sidenav black-text" id="sidenav">
   <li style="margin-top:10px;" class="center"><img width=20% src="<?= base_url('')?>assets/img/logo.png"></li>
    <li><div class="divider"></div></li>
    <li><a href="<?= base_url('')?>Admin_dashboard/user" >Pengguna</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?= base_url('')?>Admin_dashboard/peminjaman" >Peminjaman</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?= base_url('')?>Admin_dashboard/barang" >Barang</a></li>
    <li><div class="divider"></div></li>
  </ul>

  <div class="parallax-container">
      <div class="parallax"><img src="<?= base_url('')?>assets/img/admina.jpg"></div>
      <div class="container efek">
        <br><br><br>
        <div class="row">
          <div class="col m2 push-m5"><h1><i class="large material-icons white-text">bubble_chart</i></h1></div>
        </div>
          <h2 class="center light white-text">Selamat Datang <?= $nama?></h2>
      </div>
  </div>


  <section id="cuti" class="pink lighten-5 scrollspy">
    <div class="container">
      <div class="row">
            <h3 class="center light white-text" >Pengelolahan Barang Inventaris </h3>
            <h5 class="center light white-text">Sarana dan Prasarana</h5>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="card-panel col m4 pull-m1 center pilih">
         <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="<?= base_url('')?>assets/img/u.jpg">
         </div>
         <div class="card-content">
            <p><a href="<?= base_url('')?>Admin_dashboard/user" class="waves-effect waves-light btn pink lighten-3">Pengguna</a></p>
        </div>
        </div>
        <div class="card-panel col m4 center pilih">
         <div class="card-image waves-effect waves-block waves-light ">
          <img class="activator" src="<?= base_url('')?>assets/img/pinjam.jpg">
         </div>
         <div class="card-content">
            <p><a href="<?= base_url('')?>Admin_dashboard/peminjaman" class="waves-effect waves-light btn pink lighten-3">Peminjaman</a></p>
        </div>
        </div>
        <div class="card-panel col m4 push-m1 center pilih">
         <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="<?= base_url('')?>assets/img/obarang.jpg">
         </div>
         <div class="card-content">
            <p><a href="<?= base_url('')?>Admin_dashboard/barang" class="waves-effect waves-light btn pink lighten-3">Barang</a></p>
        </div>
        </div>
      </div>
    </div>
  </section>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url('')?>assets/js/materialize.min.js"></script>
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