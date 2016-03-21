<h2><?= $course->title ?> Attendance</h2>

<?php if ($_SESSION['currentUserRole'] == 'student') { ?>
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Attendance</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($attendanceRecords as $attendanceRecord) { ?>
        <tr>
          <td><?= $attendanceRecord->day ?></td>
          <td>
            <?= AttendanceHelper::saneAttendance($attendanceRecord->hasAttended) ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
<a class="btn btn-primary" href="?controller=attendance&action=generateAttendance&course_id=<?= $_GET['course_id'] ?>">Generate Attendance for today</a>

<table class="table">
  <thead>
    <tr>
      <th>Student Email</th>
      <th>Date</th>
      <th>Attendance</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($attendanceRecords as $attendanceRecord) { ?>
      <tr>
        <td><?= User::find($attendanceRecord->studentId)->email ?></td>
        <td><?= $attendanceRecord->day ?></td>
        <td>
          <a href="?controller=attendance&action=toggleAttendance&course_id=<?= $_GET['course_id'] ?>&student_id=<?= $attendanceRecord->studentId ?>">
            <?= AttendanceHelper::saneAttendance($attendanceRecord->hasAttended) ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
