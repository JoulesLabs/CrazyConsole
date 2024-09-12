import { Controller } from '@hotwired/stimulus'
import 'select2/dist/css/select2.min.css';
import "select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.min.css";
import $ from "jquery";
import select2 from 'select2';

window.$ = window.jQuery = $;

select2();
// Usage: data-controller="flash"
export default class extends Controller {
    connect() {
        console.log('Select2 Controller Connected', $);
        $('.select2-tags').select2({
            "theme": "bootstrap-5"
        });
    }
}
