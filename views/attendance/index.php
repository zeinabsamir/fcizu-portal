<h1>Keep track of studenets attendance</h1>
<?php foreach($myCoursesList as $course) { ?>
  <a href='?controller=attendance&action=show&course_id=<?php echo $course->id; ?>'><?= $course->title ?></a>
<?php } ?>
