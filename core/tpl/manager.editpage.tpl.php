<?php @include_once(dirname(dirname(__FILE__)) . '/templates/manager.header.tpl.php'); ?>
			<div class="right-container">
				<h3>Editing: pagename</h3>
				<form id="editpage" class="form" action="" method="post">
					<fieldset>
						<div>
							<label>Pagetitle:</label> <input name="pagetitle" type="text" value="<?php echo $results['pagetitle']; ?>" />
						</div>
						<div>
							<label>Alias:</label> <input name="alias" type="text" placeholder="enter a url alias, e.g 'my-page'" />
						</div>
						<div>
							<label>Author:</label> 
							<select name="author" id="created-by">
								<option value="name1">name1</option>
								<option value="name2">name2</option>
								<option value="name3">name3</option>
							</select>
						</div>
						<div>
							<label>Created:</label> <input name="created" type="datetime">
						</div>
						<div>
							<label>Modified:</label> <input name="modified" type="datetime">
						</div>
						<div>
							<label>Active:</label> <input type="checkbox" name="active" value="active" checked />
						</div>
						<div>
							<label>Description:</label> <textarea name="description" rows="5" cols="5" placeholder="enter a description.."></textarea>
						</div>
						<div>
							<label>Content:</label> <textarea name="content" rows="20" cols="15" placeholder="enter the content.."></textarea>
						</div>
						<div style="float: right;">
							<button class="button" type="submit">submit &gt;</button>
						</div>
					</fieldset>
				</form>
			</div>
<?php @include_once(dirname(dirname(__FILE__)) . '/templates/manager.footer.tpl.php'); ?>