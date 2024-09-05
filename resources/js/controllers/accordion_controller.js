import { Controller } from '@hotwired/stimulus'
import {Collapse} from "bootstrap";

// Usage: data-controller="flash"
export default class extends Controller {

    initialize() {
        // Select the accordion buttons
        const accordionButtons = this.element.querySelectorAll('.accordion-button');
        console.log(accordionButtons);

        // Attach click event to each accordion button
        accordionButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = button.getAttribute('data-coreui-target');
                const targetElement = document.querySelector(targetId);

                // Toggle collapse functionality programmatically
                const collapseInstance = new Collapse(targetElement, {
                    toggle: true
                });
                collapseInstance.toggle();
            });
        });

    }
    toggle(event) {

    }
}
