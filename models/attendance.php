<?php
  class Attendance {
    public $id;
    public $courseId;
    public $studentId;
    public $teacherId;
    public $hasAttended;
    public $day;
    public $createdAt;

    public function __construct($id, $courseId, $studentId, $teacherId, $hasAttended,
                                $day, $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->studentId = $studentId;
      $this->teacherId = $teacherId;
      $this->hasAttended = $hasAttended;
      $this->day = $day;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $studentId, $teacherId, $hasAttended, $day) {
      $query = "INSERT INTO attendance (course_id, student_id, teacher_id, has_attended, day, created_at)
                VALUES ('$courseId', '$studentId', '$teacherId', '$hasAttended', '$day', now())";

      if(mysql_query($query)) {
        return new Attendance(null, $courseId, $studentId, $teacherId,
                        $hasAttended, $day, null);
      } else {
        $_SESSION['notice'] = "Attendance error: ".mysql_error()."\n";
      }
    }

    public static function find($courseId, $studentId, $day) {
      $query = "SELECT * FROM attendance WHERE course_id='$courseId' AND student_id='$studentId' AND day='$day' LIMIT 1";
      $result = mysql_query($query);
      $attendance = mysql_fetch_array($result);

      return new Attendance($attendance['id'], $attendance['course_id'], $attendance['student_id'],
                            $attendance['teacher_id'], $attendance['has_attended'],
                            $attendance['day'], $attendance['created_at']);
    }

    public static function delete($courseId, $studentId, $day) {
      // Check if the record exists
      if($attendance = Attendance::find($courseId, $studentId, $day)) {
        $query = "DELETE FROM attendance WHERE id='$attendance->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

  }
?>

