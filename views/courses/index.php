<h1>Listing Courses</h1>

<?php foreach($courses as $course) { ?>
  <p>
    <?php echo $course->title; ?>
    <a href='?controller=courses&action=show&id=<?php echo $course->id; ?>'>Show</a>
    <a href="?controller=courses&action=edit&id=<?php echo $course->id ?>">Edit</a>
    <a href='?controller=courses&action=destroy&id=<?php echo $course->id; ?>'>Delete</a>
  </p>
<?php } ?>

