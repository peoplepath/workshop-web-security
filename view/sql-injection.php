<form method="get">
    <input type="text" name="q" value="<?= $query ?>">
    <input type="submit" name="">
</form>
<code><?= $sql ?></code>
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
