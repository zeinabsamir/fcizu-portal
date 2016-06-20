<h1>Materials</h1>

<br>

<div class="form-element form-group">
  <select name="courses" id="courses" class="form-control">
    <?php foreach($myCoursesList as $course) { ?>
      <option value="?controller=materials&action=show&course_id=<?php echo $course->id; ?>"><?= $course->title ?></option>
    <?php } ?>
  </select>
</div>

<a id="goToPage" onClick="changePath()" href="" class="btn btn-default">View Page</a>

<script type="text/javascript">
function changePath() {
  var path= document.getElementById("courses").value;
  $("#goToPage").attr('href', path);
}
</script>
