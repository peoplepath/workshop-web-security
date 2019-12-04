<h3>User list</h3>
<form method="get">
    <div class="form-group">
        <input type="text" name="q" value="<?= $query ?>" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
<?php if ($users) { ?>
<table class="table">
    <tr>
        <?php foreach (array_keys(reset($users)) as $header) { ?>
        <th><?= $header ?></th>
        <?php } ?>
    </tr>
    <?php foreach ($users as $user) { ?>
    <tr>
        <?php foreach ($user as $value) { ?>
        <td><?= $value ?></td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
<?php } else { ?>
<div>No users found!</div>
<?php } ?>
<code><?= $sql ?></code>
