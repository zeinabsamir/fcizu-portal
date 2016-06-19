<h2><?= $course->title ?> grade</h2>

<?php if ($_SESSION['currentUserRole'] == 'student') { ?>
  <table class="table">
    <thead>
      <tr>
        <th>title</th>
        <th>Grade</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($gradeRecords as $gradeRecord) { ?>
        <tr>
          <td><?= $gradeRecord->title ?></td>
          <td><?= $gradeRecord->grade ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
<form action="?controller=grades&action=generateGrades&course_id=<?= $_GET['course_id'] ?>" method="post">
  <h5>New Entries</h5>
  <div class="form-element form-group">
    <input type="text" name="title" class="form-control" placeholder="Entry Title">
  </div>
  <div class="form-element form-group">
    <input type="submit" name="newGradesSubmit" value="Add" class="btn btn-default">
  </div>
</form>

<hr>

<form action="?controller=grades&action=removeGrades&course_id=<?= $_GET['course_id'] ?>" method="post">
  <h5>Remove Entries</h5>
  <div class="form-element form-group">
    <select name="title" class="form-control">
      <?php foreach($gradeTitles as $gradeTitle){ ?>
        <option value="<?= $gradeTitle ?>"><?= $gradeTitle ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-element form-group">
    <input type="submit" name="removeGradesSubmit" value="Remove" class="btn btn-default">
  </div>
</form>

<hr>

<table class="table">
    <thead>
      <tr>
        <th>Student Email</th>
        <th>title</th>
        <th>Grade</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($gradeRecords as $gradeRecord) { ?>
        <tr>
          <td><?= User::find($gradeRecord->studentId)->email ?></td>
          <td><?= $gradeRecord->title ?></td>
          <form action="?controller=grades&action=edit&course_id=<?= $_GET['course_id'] ?>&grade_id=<?= $gradeRecord->id ?>" method="post">
            <td><input type="text" name="grade" placeholder="<?= $gradeRecord->grade ?>" class="form-control" size="1"></td>
            <td>
              <input type="submit" name="updateGradeSubmit" value="Update" class="btn btn-default">
            </td>
          </form>
        </tr>
      <?php } ?>
    </tbody>
</table>
<?php } ?>
