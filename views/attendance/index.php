<h1>Keep track of studenets attendance</h1>
<?php foreach($myCoursesList as $course) { ?>
  <a href='?controller=courses&action=show&id=<?php echo $course->id; ?>'><?= $course->title ?></a>
<?php } ?>
