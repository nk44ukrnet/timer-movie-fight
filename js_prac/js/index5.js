const btns = document.querySelectorAll('button');

// console.log(btns[0].classList.length); //lenght of classes
console.log(btns[0].classList.item(0)); // class="" index 0

console.log(btns[0].matches("button.firstOne")); // true/false .class #id

let modal = document.querySelector('[data-modal]');

window.addEventListener('click', function () {
    if(modal.dataset.modal === 'modal1') {
        console.log('modal1');
    }
});