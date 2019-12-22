<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
  <style type="text/css">
    .dz-preview .dz-image img{
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
      }
  </style>
</head>

<body id="page-top">

  <?php $this->load->view("_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-body">
            <h1>Detail Data User</h1><hr>
            <div class="table-responsive">
              <table class="table table-condensed table-detail-data" width="80%">
                <tr>
                  <th width="25%">Nama Lengkap</th>
                  <td><?php echo $user->nama; ?></td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td><?php if ($user->jenis_kelamin == 'L') echo "Laki-Laki"; else echo "Perempuan"; ?></td>
                </tr>
                <tr>
                  <th>Tempat Lahir</th>
                  <td><?php if ($user->tempat_lahir != NULL) echo $user->tempat_lahir; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td><?php 
                    if ($user->tanggal_lahir != null) {
                      $temp = explode('-', $user->tanggal_lahir);
                      echo $temp[2] . '-' . $temp[1] . '-' . $temp[0];
                    }
                   ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?php if ($user->alamat != NULL) echo $user->alamat; ?></td>
                </tr>
                <tr>
                  <th>Telepon 1</th>
                  <td><?php if ($user->tlp1 != NULL) echo $user->tlp1; ?></td>
                </tr>
                <tr>
                  <th>Telepon 2</th>
                  <td><?php if ($user->tlp2 != NULL) echo $user->tlp2; ?></td>
                </tr>
                <tr>
                  <th>Whatsapp</th>
                  <td><?php if ($user->wa != NULL) echo $user->wa; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php if ($user->email != NULL) echo $user->email; ?></td>
                </tr>
                <tr>
                  <th>Kategori</th>
                  <td><?php if ($user->kategori != NULL) echo $user->kategori; ?></td>
                </tr>
                <tr>
                  <th>Minat</th>
                  <td><?php
                    $temp = '';
                    if ($user->pujabakti != NULL and $user->pujabakti != '0') $temp .= 'Pujabakti, ';
                    if ($user->meditasi != NULL and $user->meditasi != '0') $temp .= 'Meditasi, ';
                    if ($user->dana_makan != NULL and $user->dana_makan != '0') $temp .= 'Dana Makan, ';
                    if ($user->baksos != NULL and $user->baksos != '0') $temp .= 'Baksos, ';
                    if ($user->fung_shen != NULL and $user->fung_shen != '0') $temp .= 'Fung Shen, ';
                    if ($user->sunskul != NULL and $user->sunskul != '0') $temp .= 'Sunskul, ';
                    if ($user->bursa != NULL and $user->bursa != '0') $temp .= 'Bursa, ';
                    if ($user->keakraban != NULL and $user->keakraban != '0') $temp .= 'Keakraban, ';
                    if ($user->pelayanan_umat != NULL and $user->pelayanan_umat != '0') $temp .= 'Pelayanan Umat, ';
                    if ($user->donasi != NULL and $user->donasi != '0') $temp .= 'Donasi, ';
                    if ($user->seminar != NULL and $user->seminar != '0') $temp .= 'Seminar, ';
                    if ($user->kelas_dhamma != NULL and $user->kelas_dhamma != '0') $temp .= 'Kelas Dhamma, ';
                    if ($user->buku != NULL and $user->buku != '0') $temp .= 'Buku/e-book, ';
                    echo substr($temp, 0, -2);
                  ?></td>
                </tr>
                <tr>
                  <th>Jenis Kendaraan</th>
                  <td><?php if ($user->jenis_kendaraan != NULL) echo $user->jenis_kendaraan; ?></td>
                </tr>
                <tr>
                  <th>Nomor Kendaraan</th>
                  <td><?php if ($user->no_kendaraan != NULL) echo $user->no_kendaraan; ?></td>
                </tr>
                <tr>
                  <th>Goldar</th>
                  <td><?php if ($user->goldar != NULL) echo $user->goldar; ?></td>
                </tr>
                <tr>
                  <th>Nama Buddhist</th>
                  <td><?php if ($user->nama_buddhist != NULL) echo $user->nama_buddhist; ?></td>
                </tr>
                <tr>
                  <th>Foto</th>
                  <td>
                    <form class="dropzone" id="dropzone" action="<?php echo site_url('user/upload_foto/' . $user->pin) ?>" method='post'>
                    </form>
                    <button href="<?php echo site_url('user/show_foto/' . $user->pin) ?>" style="display: none;" class="btn_dummy_show"></button>
                    <button href="<?php echo site_url('user/delete_foto') ?>" style="display: none;" class="btn_dummy_delete"></button>
                  </td>
                </tr>
              </table><br>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("_partials/footer.php") ?>

    </div>
      <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php $this->load->view("_partials/scrolltop.php") ?>

  <?php $this->load->view("_partials/js.php") ?>

  <script>
      //Dropzone.autoDiscover = false;
      Dropzone.options.dropzone = {
        init: function() { 
          myDropzone = this;
          $.ajax({
            url: $('.btn_dummy_show').attr('href'),
            type: 'get',
            dataType: 'json',
            success: function(response){

              $.each(response, function(key,value) {
                let mockFile = { name: value.name, size: value.size };
                myDropzone.files.push( mockFile );
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, value.path);
                myDropzone.emit("complete", mockFile);

                var center = document.createElement('center');
                var view = document.createElement('a');
                view.href = "<?php echo site_url('user/view_foto/') ?>"+mockFile.name;
                view.className = 'btn btn-primary btn-sm text-center';
                view.innerHTML = "View";
                view.target = "_blank";
                center.appendChild(view);
                mockFile.previewTemplate.appendChild(center);
              });
            }
          })
        },
        addRemoveLinks: true,
        removedfile: function(file) {
          var name = file.name;
          $.ajax({
            type: 'POST',
            url: $('.btn_dummy_delete').attr('href'),
            data: {name: name},
            success: function(data){
              //location.reload()
            }
          });
          var _ref
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0
        },
        success: function(file, response) {
          location.reload()
        },
        maxThumbnailFilesize: 20,
        acceptedFiles: 'image/*,.jpg,.png,.jpeg',
        thumbnailWidth:"250",
        thumbnailHeight:"250",
      };
  </script>
</body>

</html>
