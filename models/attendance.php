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

  }
?>

