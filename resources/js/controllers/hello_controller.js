// src/controllers/hello_controller.js
import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    static targets = [ "name" ]
    connect() {
        console.log("Connected to Stimulus")
    }

    greet() {
        const elm = this.nameTarget
        const name = elm.value
        alert("Hello, Stimulus! " + name)
    }
}
