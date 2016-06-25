<ul class="nav nav-stacked" id="sidebar">
  <?php if($_SESSION['currentUserIsAdmin'] == 1) { ?>
    <li><a href="?controller=users&action=index">Users</a></li>
  <?php } ?>
  <li><a href="?controller=courses&action=index">Courses</a></li>
  <li><a href="?controller=attendance&action=index">Attendance</a></li>
  <li><a href="?controller=announcements&action=index">Announcements</a></li>
  <li><a href="?controller=materials&action=index">Courses Materials</a></li>
  <li><a href="?controller=grades&action=index">Grades</a></li>
  <li><a href="?controller=assignments&action=index">Assignments</a></li>
</ul>
