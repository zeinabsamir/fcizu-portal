<h2><?= $course->title ?> Attendance</h2>

<table class="table">
  <thead>
    <tr>
      <th>Student Email</th>
      <th>Date</th>
      <th>Attendance</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($studentsList as $student) { ?>
      <tr>
        <td><?= $student->email ?></td>
        <td><?= date('d/M/Y') ?></td>
        <td>
          <a class="" href="?controller=attendance&action=addAttendance&course_id=<?= $_GET['id'] ?>&student_id=<?= $student->id ?>&teacher_id=<?= $_SESSION['currentUserID'] ?>">Add Attendance</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
