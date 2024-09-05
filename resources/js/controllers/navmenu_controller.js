import { Controller } from '@hotwired/stimulus'

// Usage: data-controller="flash"
export default class extends Controller {
    toggle(e) {
        e.preventDefault();
        e.currentTarget.parentNode.classList.toggle('show');
    }
}
