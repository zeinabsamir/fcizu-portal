<h1>Listing Users</h1>

<?php foreach($users as $user) { ?>
  <p>
    <?php echo $user->email; ?>
    <a href='?controller=users&action=show&id=<?php echo $user->id; ?>'>Show</a>
    <a href='?controller=users&action=destroy&id=<?php echo $user->id; ?>'>Delete</a>
  </p>
<?php } ?>
