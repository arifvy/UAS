
<div class="row">
	<div class="col-md-12">
		<h1 align="center">Form Buku</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Form Buku</label>
			</div>
			<div class="panel-body">
			<?php echo $alert;?>
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-2">Judul</label>
						<div class="col-md-10">
							<input type="text" name="judul" class="form-control" value="<?php echo $satu['judul'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Pengarang</label>
						<div class="col-md-10">
							<input type="text" name="pengarang" class="form-control" value="<?php echo $satu['pengarang'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Stok</label>
						<div class="col-md-10">
							<input type="text" name="stok" value="<?php echo $satu['stok'];?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2">
							<input type="hidden" name="id" value="<?php echo $satu['id'];?>">
						</div>
						<div class="col-md-10">
							<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
							<a href="<?php echo site_url();?>" class="btn btn-danger">Kembali</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>