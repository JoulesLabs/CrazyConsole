import { Controller } from '@hotwired/stimulus'

// Usage: data-controller="flash"
export default class extends Controller {
    initialize() {
       let parent = this
        window.addEventListener('click', function(e){
            if (!document.getElementById('profile-nav').contains(e.target)){
                let pn = document.getElementById('profile-nav');
                pn.classList.remove('show');
                pn.removeAttribute('aria-expanded');
                parent.element.getElementsByClassName('dropdown-menu')[0].classList.remove('show');
                parent.element.getElementsByClassName('dropdown-menu')[0].style = '';
                parent.element.getElementsByClassName('dropdown-menu')[0].setAttribute('data-popper-placement', 'bottom-start');
            }

        });
    }

    toggle(e) {
        e.preventDefault();
        let nav = e.currentTarget;
        nav.classList.toggle('show');
        nav.toggleAttribute('aria-expanded');
        this.element.getElementsByClassName('dropdown-menu')[0].classList.toggle('show');
        this.element.getElementsByClassName('dropdown-menu')[0].style = 'position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 42px);';
        this.element.getElementsByClassName('dropdown-menu')[0].setAttribute('data-popper-placement', 'bottom-end');
    }

}
