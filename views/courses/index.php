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
          <?php if(StudentCourse::isSubsribed($course->id, $_SESSION['currentUserID'])) { ?>
            <a href="?controller=courses&action=unsubscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Unubscribe</a>
          <?php } else { ?>
            <a href="?controller=courses&action=subscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Subscribe</a>
          <?php } ?> |

          <a href='?controller=courses&action=show&id=<?php echo $course->id; ?>'>Show</a> |
          <a href="?controller=courses&action=edit&id=<?php echo $course->id ?>">Edit</a> |
          <a href='?controller=courses&action=destroy&id=<?php echo $course->id; ?>'>Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
