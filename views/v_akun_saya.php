<div class="row">
  <div class="col-sm-12">
      <div class="card card-primary">
      <div class="card-header">
            <h3 class="card-title">Detail Akun Saya</h3>
          </div>
          <div class="card-body">
          <?php 
                if ($this->session->flashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo $this->session->flashdata('pesan');
                  echo '</h5></div>';
                }
                ?>
          <div class="text-center mb-5">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/foto_profil/' . $this->session->userdata('foto_profil')) ?>"
                       alt="User profile picture">
                       <h3 class="profile-username text-center"><?= $this->session->userdata('nama_pelanggan') ?></h3>
                </div>
              <table class="table">
                <tr>
                    <tr>
                    <th>Username : </th>
                    </tr>
                    <td><?= $this->session->userdata('nama_pelanggan') ?></td>
                    <tr>
                    <th>Email :</th>
                    </tr>
                    <td><?= $this->session->userdata('email') ?></td>
                </tr>
                
              </table>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $this->session->userdata('id_pelanggan') ?>">Update Profil</button>
          </div>
      </div>
  </div>

  

  <!-- <div class="col-sm-6">
  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Akun Saya</h3>
              </div>

                <div class="card-body" id="edit">
                  <div class="form-group">
                    <label>Username</label>
                    <input name="nama_pelanggan" value="" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Edit Foto Profil</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
  </div> -->

</div>

<!-- /.modal edit -->
        <div class="modal fade" id="edit<?= $this->session->userdata('id_pelanggan') ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Profil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
            <?php 
            echo form_open('pelanggan/edit/'.$this->session->userdata('id_pelanggan'));
            ?>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="nama_pelanggan" value="<?= $this->session->userdata('nama_pelanggan') ?>" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?= $this->session->userdata('email') ?>" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" value="<?= $this->session->userdata('password') ?>" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
                    <label for="exampleInputFile">Edit Foto Profil</label>
                    <input type="file" name="foto_profil" value="<?= base_url('assets/foto_profil/' . $this->session->userdata('foto_profil')) ?>" class="form-control">
            </div>

            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <?php 
              echo form_close();
              ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<!-- <div class="card card-solid">
    <div class="card-body pb-0">
    </div>
</div> -->