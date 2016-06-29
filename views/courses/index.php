<h1>Listing Courses</h1>

<?php if(UsersHelper::isAdmin()) { ?>
  <a class="btn btn-primary" href="?controller=courses&action=create">Add New Course</a>
<?php } ?>

<br>
<br>

<table class="table">
  <thead>
    <tr>
      <?php if(UsersHelper::isAdmin()){ ?>
      <th>Id</th>
      <?php } ?>
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
          <?php if(CoursesHelper::checkSubscription($course->id, $_SESSION['currentUserID'])) { ?>
            <a href="?controller=courses&action=unsubscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Unubscribe</a>
          <?php } else { ?>
            <a href="?controller=courses&action=subscribe&course_id=<?php echo $course->id; ?>&user_id=<?php echo $_SESSION['currentUserID']; ?>">Subscribe</a>
          <?php } ?> |

          <a href='?controller=courses&action=show&id=<?php echo $course->id; ?>'>Show</a>
          <?php if(UsersHelper::isAdmin()) { ?>
            |
            <a href="?controller=courses&action=edit&id=<?php echo $course->id ?>">Edit</a> |
            <a href='?controller=courses&action=destroy&id=<?php echo $course->id; ?>'>Delete</a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
