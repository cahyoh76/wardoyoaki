<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Gambar Barang</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
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
                <table class="table table-bordered" id="example1">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Cover</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <body>
                    <tbody>
                      <?php $no = 1;
                      foreach ($gambar_barang as $key => $value) { ?>
                        <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $value->nama_barang ?></td>
                        <td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar)  ?>" width="100px"></td>
                        <td class="text-center"><span class="badge bg-primary"><h5><?= $value->total_gambar_barang ?></h5></span></td>
                      <td class="text-center">
                        <a href="<?= base_url('gambar_barang/add/'.$value->id_barang) ?>" class="btn btn-success btm-sm"><i class="fas fa-plus"></i> Tambah Gambar</a>
                      </td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </body>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
