<h3>Awesome Crowd Funding</h3>
<form method="post">
<!-- <form action="https://httpbin.org/post" method="post" target="_blank"> -->
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Comment</label>
        <textarea name="comment" placeholder="Leave a comment..." class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Credit Card Number</label>
        <input type="text" name="ccn" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Pledge</button>
    </div>
</form>
<?php if ($pledges) { ?>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Comment</th>
    </tr>
    <?php foreach ($pledges as $pledge) { ?>
    <tr>
        <td><?= htmlspecialchars($pledge['name']); ?></td>
        <td><?= htmlspecialchars($pledge['comment']); ?></td>
    </tr>
    <?php } ?>
</table>
<?php } else { ?>
<div>No pledges found!</div>
<?php } ?>
