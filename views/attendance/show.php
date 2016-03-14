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
          <?php if (AttendanceHelper::checkAttendance($_GET['id'], $student->id, date('Y-m-d'))) { ?>
            <a class="" href="?controller=attendance&action=removeAttendance&course_id=<?= $_GET['id'] ?>&student_id=<?= $student->id ?>">Attended</a>
          <?php } else { ?>
            <a class="" href="?controller=attendance&action=addAttendance&course_id=<?= $_GET['id'] ?>&student_id=<?= $student->id ?>&teacher_id=<?= $_SESSION['currentUserID'] ?>">Absent</a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
