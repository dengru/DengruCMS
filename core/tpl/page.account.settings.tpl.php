			<div>
				<h3>Account Settings</h3>
				<form id="edit-account" class="form" action="" method="post">
					<fieldset>
						<div>
							<label>Username:</label> <input name="username" type="text" value="<?php echo $values->username; ?>" />
						</div>
						<div>
							<label>Email:</label> <input name="email" type="email" value="<?php echo $values->email; ?>" />
						</div>
						<div>
							<label>Address:</label> <input name="address" type="text" value="<?php echo $values->address; ?>" />
						</div>
						<div>
							<label>Phone:</label> <input name="phone" type="tel" value="<?php echo $values->phone; ?>" />
						</div>
						<div style="float: right;">
							<button class="button" type="submit" name="update-profile">save changes &gt;</button>
						</div>
					</fieldset>
				</form>
				<h3>Change Password</h3>
				<form id="account-change-password" class="form" action="" method="post">
					<fieldset>
						<div>
							<label>Old Password:</label> <input name="old_password" type="password" />
						</div>
						<div>
							<label>New Password:</label> <input name="new_password" type="password" />
						</div>
						<div style="float: right;">
							<button class="button" type="submit" name="change-password">change password &gt;</button>
						</div>
					</fieldset>
				</form>
			</div>
