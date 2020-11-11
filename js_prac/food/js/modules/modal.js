function openModal(triggerSelector, modelTimerId) {
    const modal = document.querySelector(triggerSelector)
    modal.classList.add('show');
    modal.classList.remove('hide');
    document.body.style.overflow = 'hidden';
    console.log(modelTimerId);
    if(modelTimerId) {
        clearInterval(modalTimerId);
    }
}

function closeModal(triggerSelector) {
    const modal = document.querySelector(triggerSelector)
    modal.classList.remove('show');
    modal.classList.add('hide');
    document.body.style.overflow = '';
}

function modal(triggerSelector, modalSelector, modelTimerId) {
    //modal
    const modalTrigger = document.querySelectorAll(triggerSelector),
        modal = document.querySelector(modalSelector);

    modalTrigger.forEach(btn => {
        btn.addEventListener('click', () => {
            openModal(modalSelector, modelTimerId);
        });
    });



    modal.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal') || e.target.getAttribute('data-close') == '') {
            closeModal(modalSelector);
        }
    });

    document.addEventListener('keydown', e => {
        if (e.keyCode === 27 && modal.classList.contains('show')) {
            closeModal(modalSelector);
        }
    });


    function showModalByScroll() {
        if ((window.pageYOffset + document.documentElement.clientHeight) >= document.documentElement.scrollHeight) {
            openModal(modalSelector, modelTimerId);
            window.removeEventListener('scroll', showModalByScroll);
        }
    }

    window.addEventListener('scroll', showModalByScroll);
}

export default modal;
export {closeModal};
export {openModal};