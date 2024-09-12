import './bootstrap';
import './elements/turbo-echo-stream-tag';
import './libs';
import { Application } from "@hotwired/stimulus"
import $ from 'jquery';

window.$ = window.jQuery = $;

// window.$ = window.jQuery = $;

import HelloController from './controllers/hello_controller';
import AlertController from './controllers/alert_controller.js';
import NavMenuController from './controllers/navmenu_controller.js';
import ProfileNavController from './controllers/profile_nav_controller.js';
import AccordionController from './controllers/accordion_controller.js';
import PermissionController from './controllers/permission_controller.js';
import Select2Controller from './controllers/select2_controller.js';


const application = Application.start();

application.register('hello', HelloController);
application.register('alert', AlertController);
application.register('navmenu', NavMenuController);
application.register('profile_nav', ProfileNavController);
application.register('accordion', AccordionController);
application.register('permission', PermissionController);
application.register('select2', Select2Controller);
