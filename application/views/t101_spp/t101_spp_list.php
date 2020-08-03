<?php $this->load->view("template/head", $head); ?>
<?php $this->load->view("template/topbar"); ?>
<?php $this->load->view("template/sidebar"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <!-- container fluid -->
        <div class="container-fluid">

          <div class="row">
            <div class="col">
              <form method="get" action="<?php echo site_url('t101_spp/index'); ?>" class="form-horizontal">

              	<div class="form-group">
              		<label class="control-label col-sm-1" for="nis">NIS :</label>
            			<div class="input-group">
            				<input type="text" class="form-control" name="q" placeholder="Masukkan NIS" value="<?php echo $q; ?>">
            			</div>
              	</div>

                <div class="form-group">
              		<div class="input-group">
              			<button type="submit" class="btn btn-primary">Cari Siswa</button>
                    <?php if ($q <> '') { ?>
                    &nbsp;<a href="<?php echo site_url('t101_spp'); ?>" class="btn btn-default">Reset</a>
                    <?php } ?>
              		</div>
              	</div>

              </form>
            </div>
          </div>

          <?php if ($q <> '') { ?>

          <hr/>
        	<div class="page-header">
        		<h3>Biodata Siswa</h3>
        	</div>
          <div class="table-responsive-sm">
          	<table class="table table-sm">
          		<tr>
          			<td width="200">NIS</td>
          			<td width="30">:</td>
          			<td><?php echo $dataSiswa[0]["nis"]; ?></td>
          		</tr>
          		<tr>
          			<td width="200">Nama Siswa</td>
          			<td width="30">:</td>
          			<td><?php echo $dataSiswa[0]["namasiswa"]; ?></td>
          		</tr>
          		<tr>
          			<td width="200">Kelas</td>
          			<td width="30">:</td>
          			<td><?php echo $dataSiswa[0]["kelas"]; ?></td>
          		</tr>
          		<tr>
          			<td width="200">Tahun Ajaran</td>
          			<td width="30">:</td>
          			<td><?php echo $dataSiswa[0]["tahunajaran"]; ?></td>
          		</tr>
          		<tr><td width="200"></td>
          			<td width="30"></td>
          			<td></td></tr>
          	</table>
          </div>

        	<div class="page-header">
        		<h3>Tagihan SPP Siswa</h3>
        	</div>
          <table class="table-sm table-bordered table-sm" style="margin-bottom: 10px">
            <tr>
              <th>No</th>
          		<!-- <th>Idsiswa</th> -->
              <th>Bulan</th>
          		<th>Jatuh Tempo</th>
          		<th>No. Bayar</th>
          		<th>Tgl. Bayar</th>
          		<th>SPP</th>
          		<th>Catering</th>
          		<th>Worksheet</th>
          		<th>Keterangan</th>
          		<th>Bayar</th>
            </tr>
            <?php foreach ($t101_spp_data as $t101_spp) { ?>
            <tr>
        			<td width="80px"><?php echo ++$start ?></td>
        			<!-- <td><?php //echo $t101_spp->idsiswa ?></td> -->
              <td><?php echo $t101_spp->bulan ?></td>
        			<td><?php echo date_format(date_create($t101_spp->jatuhtempo), "d-m-Y") ?></td>
        			<td><?php echo $t101_spp->nobayar ?></td>
        			<td><?php echo ($t101_spp->nobayar == "" ? "" : date_format(date_create($t101_spp->tglbayar), "d-m-Y")) ?></td>
        			<td align="right"><?php echo number_format($t101_spp->byrspp) ?></td>
        			<td align="right"><?php echo number_format($t101_spp->byrcatering) ?></td>
        			<td align="right"><?php echo number_format($t101_spp->byrworksheet) ?></td>
        			<td><?php echo $t101_spp->ket ?></td>
              <td align="center">
              <?php if ($t101_spp->nobayar == '') { ?>
						  <a href='<?php echo site_url('t101_spp/bayar/'.$t101_spp->idspp."/".$q."/".$start); ?>' class='btn btn-warning btn-sm'>Bayar</a>
              <?php } else { ?>
						  <a href='<?php echo site_url('t101_spp/cetak?idSpp='.$t101_spp->idspp."&q=".$q); ?>' class='btn btn-info btn-sm' target='blank'>Cetak</a>
              <?php } ?>
              </td>
        		</tr>
            <?php } ?>
          </table>
          <div class="row">
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
          		<?php echo anchor(site_url('t101_spp/excel'), 'Excel', 'class="btn btn-primary"'); ?>
          		<?php echo anchor(site_url('t101_spp/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
          </div>
          <?php } ?>

        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view("template/foot"); ?>
    <?php $this->load->view("template/js"); ?>
