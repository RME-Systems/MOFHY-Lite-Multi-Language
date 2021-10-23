<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My accounts</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th>ID</th>
					<th>Username</th>
					<th>Domain</th>
					<th>Deploy Date</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_status`!=0 OR `account_status`!=2 ORDER BY `account_id` DESC");
							$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($AccountInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $AccountInfo['account_username'];?></td>
						<td><?php echo $AccountInfo['account_domain'];?></td>
						<td><?php echo $AccountInfo['account_date'];?></td>
						<td><?php 
							if($AccountInfo['account_status']=='0'){
								echo '<span class="badge bg-secondary badge-pill">Inactuve</span>';
							} elseif($AccountInfo['account_status']=='1'){
								echo '<span class="badge bg-success badge-pill">Active</span>';
							} elseif($AccountInfo['account_status']=='2'){
								echo '<span class="badge bg-danger badge-pill">Suspended</span>';
							} elseif($AccountInfo['account_status']=='3'){
								echo '<span class="badge bg-primary badge-pill">Processing</span>';
							} elseif($AccountInfo['account_status']=='4'){
								echo '<span class="badge bg-primary badge-pill">Deactivating</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewaccount.php?account_id=<?php echo $AccountInfo['account_username'];?>" class="btn btn-sm btn-secondary btn-rounded">Manage</a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="6" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> free accounts</p>
	</div>
</div>