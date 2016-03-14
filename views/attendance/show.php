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
        <td><?= date('Y-m-d') ?></td>
        <td><?= $student->firstName ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
