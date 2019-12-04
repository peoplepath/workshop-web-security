<h3>Awesome Crowd Funding</h3>
<form method="post">
<!-- <form action="https://httpbin.org/post" method="post" target="_blank"> -->
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>Comment</label>
        <textarea name="comment" placeholder="Leave a comment..."></textarea>
    </div>
    <div>
        <label>Credit Card Number</label>
        <input type="text" name="ccn">
    </div>
    <div>
        <button type="submit">Pledge</button>
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
        <td><?= $pledge['name'] ?></td>
        <td><?= $pledge['comment'] ?></td>
    </tr>
    <?php } ?>
</table>
<?php } else { ?>
<div>No pledges found!</div>
<?php } ?>
