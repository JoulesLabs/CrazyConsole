import { Controller } from '@hotwired/stimulus'
import $ from 'jquery'

// Usage: data-controller="flash"
export default class extends Controller {
    denyAll() {
            $('.default').removeAttr('checked');
            $('.allow').removeAttr('checked');

            $('.deny').attr('checked','checked');
    }

    inheritAll() {
            $('.deny').removeAttr('checked');
            $('.allow').removeAttr('checked');

            $('.default').attr('checked','checked');
    }
    allowAll() {
            $('.deny').removeAttr('checked');
            $('.default').removeAttr('checked');

            $('.allow').attr('checked','checked');
    }
}
