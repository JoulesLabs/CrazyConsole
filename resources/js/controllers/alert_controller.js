import { Controller } from '@hotwired/stimulus'

// Usage: data-controller="flash"
export default class extends Controller {

    initialize() {
       setInterval(() => {
           let toasts = document.querySelectorAll('.toaster');
              toasts.forEach((toast) => {
                  let sa = toast.getAttribute('data-duration');
                  let ea = Date.now();
                    let duration = ea - sa;

                    if (duration > 5000) {
                        toast.remove();
                    }
              });
       }, 1000);

    }
    dismiss(event) {
        let toastId = "toaster-" + event.params.toastid;
        document.getElementById(toastId).remove();
    }

    confirm(event) {
        let msg = event.params.msg;

        const confirmed = confirm(msg);

        if (!confirmed) {
            event.preventDefault();
        }

    }
}
