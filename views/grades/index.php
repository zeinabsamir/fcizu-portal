<h1>Student Grades</h1>
<?php foreach($myCoursesList as $course) { ?>
  <a href='?controller=grades&action=show&course_id=<?php echo $course->id; ?>'><?= $course->title ?></a>
<?php } ?>
