import {closeModal} from "./modal";
import {openModal} from "./modal";
import {postData} from "../services/services";

function forms(formSelector, modalTimerId) {
    //forms

    const forms = document.querySelectorAll(formSelector);
    const message = {
        loading: 'Loading',
        success: 'Your form has been submited',
        failure: 'Something went wrong'
    };

    forms.forEach(item => {
        bindPostData(item);
    });




    function bindPostData(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const statusMessage = document.createElement('div');
            statusMessage.classList.add('status');
            statusMessage.textContent = message.loading;
            form.append(statusMessage);

            // const request = new XMLHttpRequest();
            // request.open('POST', 'server.php');


            // request.setRequestHeader('Content-type', 'multipart/form-data');
            //request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            const formData = new FormData(form);

            const object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            //const json = JSON.stringify(Object.fromEntries(formData.entries()));


            // console.log(object);
            // const json = JSON.stringify(object);

            // request.send(json);
            // request.send(formData);

            postData('http://localhost:3000/requests', object)
                .then(data => {
                    console.log(data);
                    showThanksModal(message.success);
                    form.reset();
                    statusMessage.remove();
                }).catch(() => {
                showThanksModal(message.failure);
            }).finally(() => {
                form.reset();
            });

            // request.addEventListener('load', ()=> {
            //     if(request.status === 200) {
            //         console.log(request.response);
            //         showThanksModal(message.success);
            //         form.reset();
            //         setTimeout(()=>{
            //           statusMessage.remove();
            //         }, 2000)
            //     } else {
            //         showThanksModal(message.failure);
            //     }
            // });
        })
    }

    function showThanksModal(message) {
        const prevModalDialog = document.querySelector('.modal__dialog');
        prevModalDialog.classList.add('hide');
        openModal('.modal', modalTimerId);

        const thanksModal = document.createElement('div');
        thanksModal.classList.add('modal__dialog');
        thanksModal.innerHTML = `
        <div class="modal__content">
        <div class="modal__close" data-close>&times;</div>
            <div class="modal__title">${message}</div>
        </div>
        `;
        document.querySelector('.modal').append(thanksModal);
        setTimeout(() => {
            thanksModal.remove();
            prevModalDialog.classList.add('show');
            prevModalDialog.classList.remove('hide');
            closeModal('.modal');
        }, 4000)
    }
}

export default forms;