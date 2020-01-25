<div class="row">
	<div class="col-md-12">
		<h1 align="center">Tabel Buku</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo site_url('buku/form');?>" class="btn btn-primary pull-left">Tambah</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=0;
				foreach($semua->result_array() as $d){ 
				$n++;?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo $d['judul'];?></td>
					<td><?php echo $d['pengarang'];?></td>
					<td><?php echo $d['stok'];?></td>
					<td>
						<a href="<?php echo site_url('buku/form/'.$d['id']);?>" class="btn btn-success">Edit</a>
						<a href="<?php echo site_url('buku/hapus/'.$d['id']);?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>