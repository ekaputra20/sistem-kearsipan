<div class="col-lg-12">
    <div class="panel panel-default"> 
        <div class="panel panel-body">
			<table id="datatable" class="table table-hover">
				<thead>
					<tr>
						<th>NIP</th>
						<th>Nama</th>
						<th>Golongan</th>
						<th>Pangkat</th>
						<th>Jabatan Fungsional</th>
						<th>Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php  
						$query = $con->getSQL("SELECT * FROM dosen");

						if(mysql_num_rows($query))
						{
							while($row = mysql_fetch_array($query)){
								?>
									<tr>
										<td><a href="dosen.php?tampil=<?php echo $row[0];?>" style="text-decoration:none;"><?php echo $row[0];?></a></td>
										<td><?php echo $row[1];?></td>
										<td><?php echo $row[2];?></td>
										<td><?php echo $row[3];?></td>
										<td><?php echo $row[4];?></td>
										<td><a class="button-size btn" href="?view=tampil_dosen&hapus=<?php echo $row[0];?>" style="text-decoration:none;">Hapus</a></td>
									</tr>
								<?php

								if(isset($_GET['hapus']))
								{
									$con->setSQL("DELETE FROM dosen WHERE nip = '".$_GET['hapus']."'");
									?>
										<script type="text/javascript">
											window.location.href = "?view=tampil_dosen";
										</script>
									<?php
								}
							}
						}
					?>
				</tbody>

			</table>
   		</div>
    </div>
</div>