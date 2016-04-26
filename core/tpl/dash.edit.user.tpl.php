<section class="dashTitle">
		<div class="inside row center">
			<div class="pad">
				<h2>Editing A User</h2>
			</div>
		</div>
	</section>
	
	<section class="dashMain">
		<div class="inside row center">
			<div class="pad">
			
				<!-- panel-element -->
				<div class="x-panel x-panel-default" id="panel-element">
				
					<!-- panel-element-body -->
					<div class="x-panel-body x-panel-body-default" id="panel-element-body">
								
						<!-- panel-account-contact -->
						<div id="panel-user-details">
							
							<h2 class="boxHeading">
								<span>User Information</span>
							</h2>
							
							<div class="x-field x-form-item x-field-default">
								<label for="user_name" class="x-form-item-label x-form-item-label-top">User Name:</label>
								<div class="x-form-item-body">
									<input type="text" name="user_name" size="20" tabindex="1" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="email" class="x-form-item-label x-form-item-label-top">Email:</label>
								<div class="x-form-item-body">
									<input type="text" name="email" size="20" tabindex="2" value="myemailadress@somesite.com" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="first_name" class="x-form-item-label x-form-item-label-top">First Name:</label>
								<div class="x-form-item-body">
									<input type="text" name="first_name" size="20" tabindex="3" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="last_name" class="x-form-item-label x-form-item-label-top">Last Name:</label>
								<div class="x-form-item-body">
									<input type="text" name="last_name" size="20" tabindex="4" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="birthdate" class="x-form-item-label x-form-item-label-top">Birthdate:</label>
								<div class="x-form-item-body">
									<input type="text" name="birthdate" size="20" tabindex="5" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="group" class="x-form-item-label x-form-item-label-top">Group:</label>
								<div class="x-form-item-body">
									<select name="group" tabindex="6" class="x-form-field x-form-select">
										<optgroup label="Groups">
											<option value="1">Administrators</option>
											<option value="2">Normal Users</option>
										</optgroup>
									</select>
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="address" class="x-form-item-label x-form-item-label-top">Address:</label>
								<div class="x-form-item-body">
									<input type="text" name="address" size="20" tabindex="7" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="country" class="x-form-item-label x-form-item-label-top">Country:</label>
								<div class="x-form-item-body">
									<input type="text" name="country" size="20" tabindex="8" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="gender" class="x-form-item-label x-form-item-label-top">Gender:</label>
								<div class="x-form-item-body">
									<select name="gender" tabindex="9" class="x-form-field x-form-select">
										<optgroup label="Gender">
											<option value="m">Male</option>
											<option value="f">Female</option>
										</optgroup>
									</select>
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="phone" class="x-form-item-label x-form-item-label-top">Phone:</label>
								<div class="x-form-item-body">
									<input type="text" name="phone" size="20" tabindex="10" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<h2 class="boxHeading">
								<span>Change User Password</span>
							</h2>
							
							<div class="x-field x-form-item x-field-default">
								<label for="new_password" class="x-form-item-label x-form-item-label-top">New Password:</label>
								<div class="x-form-item-body">
									<input type="password" name="user_password" size="20" tabindex="11" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
							
							<div class="x-field x-form-item x-field-default">
								<label for="new_password2" class="x-form-item-label x-form-item-label-top">Confirm New Password:</label>
								<div class="x-form-item-body">
									<input type="password" name="user_password2" size="20" tabindex="12" class="x-form-field x-form-text" autocomplete="off">
								</div>
								<div class="x-clear"></div>
							</div>
																											
						</div>
						<!-- end panel-user-details -->
						
						<!-- panel-controls -->
						<div id="panel-controls" class="form-controls left">
							<div class="x-btn">
								<button class="x-btn-center form-btn" name="update_user" type="submit" value="1" tabindex="13">
									<span class="x-btn-inner">Update User</span>
								</button>
							</div>
							<div class="x-clear"></div>
						</div>
						<!-- end panel-controls -->
				
					</div>
					<!-- end panel-element-body -->
					
				</div>
				<!-- end panel-element -->
					
			</div>
		</div>
					
	</section>