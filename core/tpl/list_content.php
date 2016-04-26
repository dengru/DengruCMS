<h1>All Documents</h1>
<?php if (isset($results['errorMessage'])) { ?>
<div><?php echo $results['errorMessage'] ?></div>
<?php } ?>
<?php if (isset($results['statusMessage'])) { ?>
<div><?php echo $results['statusMessage'] ?></div>
<?php } ?>
<table>
<tr>
<th>Creation date</th>
<th>Content</th>
</tr>
<?php foreach ($results['content'] as $content) { ?>
<tr onclick="location='admin.php?action:edit_content&contentId=<?php echo $content->id ?>'">
<td><?php echo date('j M Y', $content->created)?></td>
<td>
<?php echo $content->pagetitle?>
</td>
</tr>
<?php } ?>
</table>
<p><?php echo $results['totalRows'] ?> content<?php echo ($results['totalRows'] != 1) ? 's' : '' ?> in total </p>
<p><a href="admin.php?action=create_content">Create new document</a></p>