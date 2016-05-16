<h1>Materials</h1>
<?php foreach($myCoursesList as $course) { ?>
  <a href='?controller=materials&action=show&course_id=<?php echo $course->id; ?>'><?= $course->title ?></a>
<?php } ?>

