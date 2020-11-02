document.addEventListener('DOMContentLoaded', () => {
    //tabs
    const tabs = document.querySelectorAll('.tabheader__item'),
        tabsContent = document.querySelectorAll('.tabcontent'),
        tabsParent = document.querySelector('.tabcontainer');

    function hideTabContent() {
        tabsContent.forEach(item => {
            item.classList.add('hide');
            item.classList.remove('show', 'fade');
        });
        tabs.forEach(item => {
            item.classList.remove('tabheader__item_active');
        })
    }

    function showTabContent(i = 0) {
        tabsContent[i].classList.add('show', 'fade');
        tabsContent[i].classList.remove('hide');
        tabs[i].classList.add('tabheader__item_active');
    }

    hideTabContent();
    showTabContent();

    tabsParent.addEventListener('click', event => {
        const target = event.target;
        if (target && target.classList.contains('tabheader__item')) {
            tabs.forEach((item, i) => {
                if (target == item) {
                    hideTabContent();
                    showTabContent(i);
                }
            });
        }
    });

    //timer
    const deadLine = '2020-11-11';

    function getTimeRemeaning(endtime) {
        const t = Date.parse(endtime) - Date.parse(new Date()),
            days = Math.floor(t / (1000 * 60 * 60 * 24)),
            hours = Math.floor((t / (1000 * 60 * 60) % 24)),
            minutes = Math.floor((t / 1000 / 60) % 60),
            seconds = Math.floor((t / 1000) % 60);
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function getZero(num) {
        if (num >= 0 && num < 10) {
            return `0${num}`;
        } else {
            return num;
        }
    }

    function setClock(selector, endtime) {
        const timer = document.querySelector(selector),
            days = timer.querySelector('#days'),
            hours = timer.querySelector('#hours'),
            minutes = timer.querySelector('#minutes'),
            seconds = timer.querySelector('#seconds'),
            timeInterval = setInterval(updateClock, 1000);
        updateClock();

        function updateClock() {
            const t = getTimeRemeaning(endtime);

            days.innerHTML = getZero(t.days);
            hours.innerHTML = getZero(t.hours);
            minutes.innerHTML = getZero(t.minutes);
            seconds.innerHTML = getZero(t.seconds);

            if (t.toal <= 0) {
                clearInterval(timeInterval);
            }
        }
    }

    setClock('.timer', deadLine);

    //modal
    const modalTrigger = document.querySelectorAll('[data-modal]'),
        modalCloseBtn = document.querySelector('[data-close'),
        modal = document.querySelector('.modal');

    modalTrigger.forEach(btn => {
        btn.addEventListener('click', () => {
            openModal();
        });
    });

    function openModal() {
        modal.classList.add('show');
        modal.classList.remove('hide');
        document.body.style.overflow = 'hidden';
        clearInterval(modalTimerId);
    }

    modalCloseBtn.addEventListener('click', closeModal);

    function closeModal() {
        modal.classList.remove('show');
        modal.classList.add('hide');
        document.body.style.overflow = '';
    }

    modal.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            closeModal();
        }
    });

    document.addEventListener('keydown', e => {
        if (e.keyCode === 27 && modal.classList.contains('show')) {
            closeModal();
        }
    });

    const modalTimerId = setTimeout(openModal, 15000);

    function showModalByScroll() {
        if ((window.pageYOffset + document.documentElement.clientHeight) >= document.documentElement.scrollHeight) {
            openModal();
            window.removeEventListener('scroll', showModalByScroll);
        }
    }

    window.addEventListener('scroll', showModalByScroll);

    // Classes img, name, description, price
    //version1
    /*class GoodFromStore {
        constructor(img, name, desc, price){
            this.img = img;
            this.name = name;
            this.desc = desc;
            this.price = price;
        }
    }
    class GoodsFromStoreInsert extends GoodFromStore{
        constructor(img, name, desc, price, insert1, insert2, insert3, insert4){
            super(img, name, desc, price);
            this.insert1 = insert1;
            this.insert2 = insert2;
            this.insert3 = insert3;
            this.insert4 = insert4;
        }
        insertIntoPage(){
            this.insert1.src = this.img;
            this.insert2.innerHTML = `${this.name}`;
            this.insert3.innerHTML = `${this.desc}`;
            this.insert4.innerHTML = `${this.price}`;
        }
    }
    // const insertData = new GoodsFromStoreInsert;

    const menuItem = document.querySelectorAll('.menu__item');
    menuItem.forEach((item, index) => {
        let itemImg = item.querySelector('img'),
            itemName = item.querySelector('.menu__item-subtitle'),
            itemDesc = item.querySelector('.menu__item-descr'),
            itemPrice = item.querySelector('.menu__item-total span');
        let insertData;
        switch(index) {
            case 0:
                 insertData = new GoodsFromStoreInsert(
                    'img/tabs/vegy.jpg',
                    'Меню "Фитнес1"',
                    'Меню "Фитнес1" - это новый подход к приготовлению блюд: больше свежих овощей и фруктов. Продукт активных и здоровых людей. Это абсолютно новый продукт с оптимальной ценой и высоким качеством!',
                    '229',
                    itemImg,
                    itemName,
                    itemDesc,
                    itemPrice);
                insertData.insertIntoPage();
                break;

            case 1:
                insertData = new GoodsFromStoreInsert(
                    'img/tabs/elite.jpg',
                    'Меню “Премиум2”',
                    'В меню “Премиум” мы используем не только красивый дизайн упаковки, но и качественное исполнение блюд. Красная рыба, морепродукты, фрукты - ресторанное меню без похода в ресторан!',
                    '550',
                    itemImg,
                    itemName,
                    itemDesc,
                    itemPrice);
                insertData.insertIntoPage();
                break;

            case 2:
                 insertData = new GoodsFromStoreInsert(
                    'img/tabs/post.jpg',
                    'Меню "Постное3"',
                    'Меню “Постное3” - это тщательный подбор ингредиентов: полное отсутствие продуктов животного происхождения, молоко из миндаля, овса, кокоса или гречки, правильное количество белков за счет тофу и импортных вегетарианских стейков.',
                    '430',
                    itemImg,
                    itemName,
                    itemDesc,
                    itemPrice);
                insertData.insertIntoPage();
                break;
        }
    })*/

    //version2

    const menuField = document.querySelector('.menu__field .container');

    class MenuesClass {
        constructor(img, title, desc, price, append, transfer = 1, ...classes) {
            this.img = img;
            this.title = title;
            this.desc = desc;
            this.price = price;
            this.append = append;
            this.transfer = transfer;
            this.classes = classes;

            this.changeToUAH();
            this.insertToThePage();
        }

        changeToUAH() {
            this.price = this.price * this.transfer;
        }

        insertToThePage() {
            this.append.innerHTML += `
            <div class="menu__item">
            <img src="${this.img}" alt="${this.title}">
            <h3 class="menu__item-subtitle">${this.title}</h3>
            <div class="menu__item-descr">${this.desc}</div>
            <div class="menu__item-divider"></div>
            <div class="menu__item-price">
            <div class="menu__item-cost">Ціна:</div>
            <div class="menu__item-total"><span>${this.price}</span> грн/день</div>
            </div>
            </div>
            `;
        }
    }

    const good1 = new MenuesClass(
        'img/tabs/vegy.jpg',
        'Меню "Фитнес"',
        'Меню "Фитнес" - это новый подход к приготовлению блюд: больше свежих овощей и фруктов. Продукт активных и здоровых людей. Это абсолютно новый продукт с оптимальной ценой и высоким качеством!',
        '229',
        menuField
    );
    const good2 = new MenuesClass(
        'img/tabs/elite.jpg',
        'Меню “Премиум”',
        'В меню “Премиум” мы используем не только красивый дизайн упаковки, но и качественное исполнение блюд. Красная рыба, морепродукты, фрукты - ресторанное меню без похода в ресторан!',
        '550',
        menuField
    );
    const good3 = new MenuesClass(
        'img/tabs/post.jpg',
        'Меню "Постное"',
        'Меню “Постное” - это тщательный подбор ингредиентов: полное отсутствие продуктов животного происхождения, молоко из миндаля, овса, кокоса или гречки, правильное количество белков за счет тофу и импортных вегетарианских стейков.',
        '430',
        menuField
    );

    //forms

    const forms = document.querySelectorAll('form');
    const message = {
        loading: 'Loading',
        success: 'Your form has been submited',
        failure: 'Something went wrong'
    };

    forms.forEach(item => {
        postData(item);
    });

    function postData(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const statusMessage = document.createElement('div');
            statusMessage.classList.add('status');
            statusMessage.textContent = message.loading;
            form.append(statusMessage);

            const request = new XMLHttpRequest();
            request.open('POST', 'server.php');

            // request.setRequestHeader('Content-type', 'multipart/form-data');
            request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            const formData = new FormData(form);

            const object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            console.log(object);
            const json = JSON.stringify(object);

            request.send(json);
            // request.send(formData);

            request.addEventListener('load', ()=> {
                if(request.status === 200) {
                    console.log(request.response);
                    statusMessage.textContent = message.success;
                    form.reset();
                    setTimeout(()=>{
                      statusMessage.remove();
                    }, 2000)
                } else {
                    statusMessage.textContent = message.failure;
                }
            });
        })
    }
});