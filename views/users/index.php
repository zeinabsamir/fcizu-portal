<h1>Listing Users</h1>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Email</th>
      <th>Faculty</th>
      <th>Role</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($users as $user) { ?>
      <tr>
        <td><?php echo $user->id; ?></td>
        <td><?php echo $user->email; ?></td>
        <td><?php echo $user->faculty; ?></td>
        <td><?php echo $user->userRole; ?></td>
        <td>
          <a href='?controller=users&action=show&id=<?php echo $user->id; ?>'>Show</a> |
          <a href="?controller=users&action=edit&id=<?php echo $user->id ?>">Edit</a> |
          <a href='?controller=users&action=destroy&id=<?php echo $user->id; ?>'>Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
