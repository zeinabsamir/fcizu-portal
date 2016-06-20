<h2><?= $course->title ?> Assignments</h2>

<br>

<?php if ($_SESSION['currentUserRole'] == 'student') { ?>
  <div class="text-center">
    <form enctype="multipart/form-data" action="/?controller=assignments&action=create&course_id=<?= $_GET['course_id'] ?>" method="post" class="form-inline">

      <div class="form-element form-group">
        <label>Add New File </label>
        <input type="file" name="file_url" class="form-control"></input>
      </div>

      <div class="form-element form-group">
        <input type="text" name="description" class="form-control" placeholder="Description"></input>
      </div>

      <div class="form-element form-group">
        <input type="submit" name="createAssignmentSubmit" value="Upload" class="btn btn-default">
      </div>
    </form>
  </div>
<?php } ?>

<br>

<?php foreach($assignments as $assignment) { ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <b>
        <?= UsersHelper::fullName($assignment->studentId) ?> &middot;
        <?= date_format(date_create($assignment->createdAt), "Y/m/d h:i a") ?>
        </b>
          |
          <a href="/?controller=assignments&action=download&assignment_id=<?= $assignment->id ?>">
            Download
          </a>
        <?php if ($_SESSION['currentUserRole'] == 'student') { ?>
          |
          <a href="/?controller=assignments&action=destroy&assignment_id=<?= $assignment->id ?>&course_id=<?= $_GET['course_id'] ?>">
            Delete
          </a>
        <?php } ?>

      <p>
        <?= $assignment->description ?>
      </p>
    </div>
  </div>
<?php } ?>
