<?php
  function call($controller, $action) {
    // require all the models to the whole application
    require_once('models/application.php');

    // require all the helpers to the application
    require_once('helpers/application_helper.php');

    // require the file that matches the controller name from controllers/ folder
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'application':
        $controller = new ApplicationController();
        break;
      case 'users':
        // we need the model to query the database later in the controller
        $controller = new UsersController();
        break;
      case 'courses':
        $controller = new CoursesController();
        break;
      case 'attendance':
        $controller = new AttendanceController();
        break;
      case 'announcements':
        $controller = new AnnouncementsController();
        break;
      case 'materials':
        $controller = new MaterialsController();
        break;
      case 'grades':
        $controller = new GradesController();
        break;
      case 'assignments':
        $controller = new AssignmentsController();
        break;
    }

    // call the action
    $controller->{ $action }();
  }

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array('application' => ['home', 'error'],
                     'users' => ['index', 'show', 'edit', 'destroy', 'login', 'register', 'logout'],
                     'courses' => ['index', 'show', 'create', 'edit', 'destroy', 'subscribe', 'unsubscribe'],
                     'attendance' => ['index', 'show', 'generateAttendance', 'removeAttendance', 'toggleAttendance'],
                     'announcements' => ['index', 'show', 'create', 'destroy'],
                     'materials' => ['index', 'show', 'create', 'destroy', 'download'],
                     'grades' => ['index', 'show', 'generateGrades', 'removeGrades', 'edit'],
                     'assignments' => ['index', 'show', 'create', 'destroy', 'download']);

// check that the requested controller and action are both allowed in $controllers variable above
// if someone tries to access something else he will be redirected to the error action of the application controller
if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('application', 'error');
  }
} else {
  call('application', 'error');
}
?>
