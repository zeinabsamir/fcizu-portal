<?php
  function call($controller, $action) {
    // require the file that matches the controller name from controllers/ folder
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'application':
        $controller = new ApplicationController();
      break;
      case 'users':
        // we need the model to query the database later in the controller
        require_once('models/user.php');
        $controller = new UsersController();
      break;
    }

    // call the action
    $controller->{ $action }();
  }

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array('application' => ['home', 'error'],
                     'users' => ['index', 'show', 'edit', 'destroy', 'login', 'register', 'logout']);

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
