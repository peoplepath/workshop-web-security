<h3>Indian restaurant</h3>
<?php if (empty($_SESSION['login'])) { ?>
<a class="btn btn-primary" href="?login" role="button">Login</a>
<?php } else { ?>
<form method="post">
    <div>
        <label>Address</label>
        <input type="text" name="address">
    </div>
    <div>
        <label>Dish</label>
        <select name="dish">
            <option></option>
            <option>Malai Kofta</option>
            <option>Kadai Paneer</option>
            <option>Chicken Vindaloo</option>
        </select>
    </div>
    <div>
        <button type="submit">Pay & Order</button>
    </div>
</form>
    <?php if ($orders) { ?>
    <table class="table">
        <tr>
            <th>Address</th>
            <th>Dish</th>
        </tr>
        <?php foreach ($orders as $order) { ?>
        <tr>
            <td><?= $order['address'] ?></td>
            <td><?= $order['dish'] ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
    <div>No orders found!</div>
    <?php } ?>
<?php }
