<section class="dashTitle">
		<div class="inside row center">
			<div class="pad">
				<h2>Editing A Page</h2>
			</div>
		</div>
	</section>
	
	<section class="dashMain">
		<div class="inside row center">
			<div class="pad">
			
			<?php if (!$this->errMsg) { ?>
				
			<?php foreach ($this->pVars as $pVars) { ?>
				<!-- panel-element -->
				<div class="x-panel x-panel-default" id="panel-element">
				
					<!-- panel-element-body -->
					<div class="x-panel-body x-panel-body-default" id="panel-element-body">
							
						<!-- panel-page-details -->
						<div id="panel-page-details">
							
							<h2 class="boxHeading">
								<span>Details</span>
							</h2>
							
							
							<div class="x-field x-form-item x-field-default">
								<label for="pagetitle" class="x-form-item-label x-form-item-label-top">Page Title:</label>
								<div class="x-form-item-body">
									<input type="text" name="pagetitle" size="20" tabindex="1" class="x-form-field x-form-text" value="<?php echo $pVars['pagetitle']; ?>" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="pagealias" class="x-form-item-label x-form-item-label-top">Page Alias:</label>
								<div class="x-form-item-body">
									<input type="text" name="pagealias" size="20" tabindex="2" class="x-form-field x-form-text" value="<?php echo $pVars['pagealias']; ?>" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="editedon" class="x-form-item-label x-form-item-label-top">Edited On:</label>
								<div class="x-form-item-body">
									<input type="text" name="createdon" size="20" tabindex="3" class="x-form-field x-form-text" value="2013-05-19" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="editedby" class="x-form-item-label x-form-item-label-top">Edited By:</label>
								<div class="x-form-item-body">
									<input type="text" name="createdon" size="20" tabindex="4" class="x-form-field x-form-text" value="Trollet" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="createdon" class="x-form-item-label x-form-item-label-top">Created On:</label>
								<div class="x-form-item-body">
									<input type="text" name="createdon" size="20" tabindex="5" class="x-form-field x-form-text" value="2013-05-17" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="createdby" class="x-form-item-label x-form-item-label-top">Created By:</label>
								<div class="x-form-item-body">
									<input type="text" name="createdby" size="20" tabindex="6" class="x-form-field x-form-text" value="accountname" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
						
							<div class="x-field x-form-item x-field-default">
								<label for="groups" class="x-form-item-label x-form-item-label-top">Permitted Groups:</label>
								<div class="x-form-item-body">
									<select name="groups" tabindex="9" class="x-form-field x-form-multisel" multiple>
										<option value="1">Members</option>
										<option value="2">Guests</option>
										<option value="3">Administrators</option>
									</select>
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="published" class="x-form-item-label x-form-item-label-top">Published:</label>
								<div class="x-form-item-body">
									<input type="checkbox" name="published" tabindex="10" class="x-form-field x-form-check">
								</div>
								<div class="x-clear"></div>
							</div>
						
						</div>
						
						<!-- end panel-page-details -->
			
						
						
						<!-- panel-page-addit-details -->
						<div id="panel-page-addit-details">
							
							<div class="x-field x-form-item x-field-default">
								<label for="content" class="x-form-item-label x-form-item-label-top">Content:</label>
								<div class="x-form-item-body">
									<textarea name="content" rows="12" cols="10" tabindex="7" class="x-form-field x-form-text"></textarea>
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="description" class="x-form-item-label x-form-item-label-top">Description:</label>
								<div class="x-form-item-body">
									<textarea name="description" rows="5" cols="10" tabindex="8" class="x-form-field x-form-text"></textarea>
								</div>
								<div class="x-clear"></div>
							</div>
						
						<?php } ?>
						</div>
						<!-- end panel-page-addit-details -->
						
						<!-- panel-controls -->
						<div id="panel-controls" class="form-controls">
							<div class="x-btn">
								<button class="x-btn-center form-btn" name="save_changes" type="submit" value="1" tabindex="11">
									<span class="x-btn-inner">Save Changes</span>
								</button>
							</div>
							<div class="x-clear"></div>
						</div>
						<!-- end panel-controls -->
				
					</div>
					<!-- end panel-element-body -->
					
				</div>
				<!-- end panel-element -->
				<?php } else {?>
				
				<div class="errorMessage">
					<p><?php echo $this->errMsg; ?> <a href="pages">Go back.</a></p>
				</div>
				<?php } ?>

			</div>
		</div>
					
	</section>