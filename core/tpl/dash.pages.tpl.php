<section class="dashTitle">
		<div class="inside row center">
			<div class="pad">
				<h2>Managing Pages</h2>
			</div>
		</div>
	</section>
	
	<section class="dashMain">
		<div class="inside row center">
			<div class="pad">
			
				<div class="x-grid" id="grid-default">
					<div class="x-grid-body" id="grid-default-body">
						<h2 class="boxHeading">
							<span>Pages</span>
						</h2>
						
						<div id="grid-controls-top">
							<a class="add-btn" href="page/new">
								Add Page
							</a>
						</div>
						
						<table class="x-grid-table" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr class="x-grid-header-row">
									
									<th class="x-grid-header x-grid-col" style="width:3%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													#
												</span>
											</div>
										</div>
									</th>
									
									<th class="x-grid-header x-grid-col" style="width:20%;">
										<div class="x-grid-column-header x-grid-column-header-first">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													Name
												</span>
											</div>
										</div>
									</th>
										
									<th class="x-grid-header x-grid-col" style="width:17%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													Created On
												</span>
											</div>
										</div>
									</th>
									<th class="x-grid-header x-grid-col" style="width:10%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													Created By
												</span>
											</div>
										</div>
									</th>
									<th class="x-grid-header x-grid-col" style="width:17%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													Edited On
												</span>
											</div>
										</div>
									</th>
									<th class="x-grid-header x-grid-col" style="width:10%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">	
												<span class="x-grid-column-header-inner-text">
													Edited By
												</span>
											</div>
										</div>
									</th>
									<th class="x-grid-header x-grid-col" style="width:12%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">
												<span class="x-grid-column-header-inner-text">
													Published
												</span>
											</div>
										</div>
									</th>
									<th class="x-grid-header x-grid-col" style="width:15%;">
										<div class="x-grid-column-header">	
											<div class="x-grid-column-header-inner">
											</div>
										</div>
									</th>
								</tr>
																
								<?php foreach ($this->result as $res) {?>
								<tr class="x-grid-row">
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php echo $res['id']; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<div class="x-grid-cell-inner-title">
												<p><?php echo $res['pagetitle']; ?></p>
											</div>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php echo $res['createdon']; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php echo $res['createdby']; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php if (empty($res['editedon']) || $res['editedon'] == '0000-00-00') echo 'Never'; else echo $res['editedon']; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php if (empty($res['editedby'])) echo 'None'; else echo $res['editedby']; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<p><?php if ($res['published'] == 0) echo 'No'; else echo 'Yes'; ?></p>
										</div>
									</td>
									<td class="x-grid-cell">
										<div class="x-grid-cell-inner">
											<div class="x-grid-cell-inner-btns">
												
												<a class="x-btn-center x-grid-btn" href="http://dashboard.dengru/page/edit/<?php echo $res['id']; ?>">
													<span class="x-btn-inner x-grid-btn-inner">Edit</span>
												</a>
											
												<a class="x-btn-center x-grid-btn delete-btn" href="http://dashboard.dengru/page/delete/<?php echo $res['id']; ?>">
													<span class="x-btn-inner x-grid-btn-inner">Delete</span>
												</a>
												<div class="x-clear"></div>
											</div>
										</div>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>

	</section>