var gradeField = document.querySelector("input[name=grade]");

gradeField.addEventListener("invalid", function(){
    this.setCustomValidity('');
    if (!this.validity.valid) {
    this.setCustomValidity('Nilai grade salah');
    }
});