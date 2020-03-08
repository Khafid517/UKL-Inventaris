<!DOCTYPE html>
  <html>
    <head>
	    <title>Cuti Online</title>
	    <!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="<?= base_url('')?>assets/css/materialize.min.css"  media="screen,projection"/>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <style type="text/css">
			.efek {
            	text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
	        }
	        section, footer {
            	padding: 20px 0px; 
        	}
        	.card-panel {
        		margin-top: 40px;
        	}
          body {
            background-image: url("<?= base_url('')?>assets/img/a.jpg");
            background-size: cover;
          }
          .ajukan{
            margin-bottom: 10px;
          }
	    </style>


    </head>


    <body>
    <div class="navbar-fixed">
      <nav class="pink lighten-2">
          <div class="container">
              <div class="nav-wrapper">
          <a href="<?= base_url('')?>Admin_dashboard" data-target="sidenav" class="sidenav-trigger"><i class="material-icons" >menu</i></a>
          <a href="<?= base_url('')?>Admin_dashboard" class="brand-logo"><i class="material-icons">bubble_chart</i>BORROW</a>
          <ul class="right hide-on-med-and-down">
             <li><a href="<?= base_url('')?>Admin_dashboard/user" >Pengguna</a></li>
             <li><a href="<?= base_url('')?>Admin_dashboard/peminjaman" >Peminjaman</a></li>
             <li class="active"><a href="<?= base_url('')?>Admin_dashboard/barang" >Barang</a></li>
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
    <li class="active"><a href="<?= base_url('')?>Admin_dashboard/barang" >Barang</a></li>
    <li><div class="divider"></div></li>
  </ul>

    <section class="formulir">
        <div class="container">
            <h3 class="light center white-text text-darken-3 efek">Ubah Jenis</h3>
            <?php foreach($jeni as $key ):?>
            <div class="row">
            <form action="<?= base_url('')?>Admin_dashboard/proses_edit_jenis/<?= $key['id_jenis']?>" method="post">
              <div class=" card-panel center">
                <div class="input-field">
                  <i class="material-icons prefix">account_circle</i>
                  <input name="jenis" id="nama" type="text" value="<?= $key['nama_jenis']?>" required>
                  <label for="nama">Jenis</label>
                </div>
                <div class="input-field row">
                  <i class="material-icons prefix">phone_android</i>
                  <input name="deskripsi" id="hp" type="text" value="<?= $key['keterangan']?>" required>
                  <label for="hp">Deskripsi</label>
                </div>
            <?php endforeach;?>
                <button type="submit" class="waves-effect waves-light btn pink lighten-3">Ubah</button>
                </div>
              </div>
            </form>
            </div>
        </div>
    </section>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?= base_url('')?>assets/js/materialize.min.js"></script>
      <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
        const datePicker = document.querySelectorAll('.datepicker');
        M.Datepicker.init(datePicker);
      </script>
    </body>
  </html>