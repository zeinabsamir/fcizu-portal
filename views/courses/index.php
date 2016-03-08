<h1>Listing Courses</h1>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Code</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($courses as $course) { ?>
      <tr>
        <td><?php echo $course->id; ?></td>
        <td><?php echo $course->title; ?></td>
        <td><?php echo $course->code; ?></td>
        <td>
          <a href='?controller=courses&action=show&id=<?php echo $course->id; ?>'>Show</a> |
          <a href="?controller=courses&action=edit&id=<?php echo $course->id ?>">Edit</a> |
          <a href='?controller=courses&action=destroy&id=<?php echo $course->id; ?>'>Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
