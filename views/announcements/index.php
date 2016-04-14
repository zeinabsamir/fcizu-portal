<h1>Announcements</h1>
<?php foreach($myCoursesList as $course) { ?>
  <a href='?controller=announcements&action=show&course_id=<?php echo $course->id; ?>'><?= $course->title ?></a>
<?php } ?>
