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


    function closeModal() {
        modal.classList.remove('show');
        modal.classList.add('hide');
        document.body.style.overflow = '';
    }

    modal.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal') || e.target.getAttribute('data-close') == '') {
            closeModal();
        }
    });

    document.addEventListener('keydown', e => {
        if (e.keyCode === 27 && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // const modalTimerId = setTimeout(openModal, 15000);

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

    const getResource = async (url) => {
        const res = await fetch(url);
        if (!res.ok) {
            throw new Error(`Could not fetch ${url}, status: ${res.status}`);
        }
        return await res.json();
    };


    // getResource('http://localhost:3000/menu')
    //     .then(data => {
    //        data.forEach(({img, title, descr, price}) => {
    //            new MenuesClass(img, title, descr, price, menuField);
    //        });
    //     });

    axios.get('http://localhost:3000/menu')
        .then(data => {
            data.data.forEach(({img, title, descr, price}) => {
                new MenuesClass(img, title, descr, price, menuField);
            });
        });

    /*  getResource('http://localhost:3000/menu')
          .then(data => createCard(data));

      function createCard(data) {
          data.forEach(({img, altimg, title, descr, price}) => {
              const element = document.createElement('div');
              element.classList.add('menu__item');
              element.innerHTML = `
                 <img src="${img}" alt="${altimg}">
              <h3 class="menu__item-subtitle">${title}</h3>
              <div class="menu__item-descr">${descr}</div>
              <div class="menu__item-divider"></div>
              <div class="menu__item-price">
              <div class="menu__item-cost">Ціна:</div>
              <div class="menu__item-total"><span>${price}</span> грн/день</div>
              </div>
              `;
              menuField.append(element);
          })
      }*/

    /*const good1 = new MenuesClass(
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
    );*/

    //forms

    const forms = document.querySelectorAll('form');
    const message = {
        loading: 'Loading',
        success: 'Your form has been submited',
        failure: 'Something went wrong'
    };

    forms.forEach(item => {
        bindPostData(item);
    });

    const postData = async (url, data) => {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return await res.json();
    };


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
        openModal();

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
            closeModal();
        }, 4000)
    }

    fetch('js/db.json')
        .then(data => data.json())
        .then(data => console.log(data))
        .catch(err => console.log(err));


    //slider

    /*let prevSlide = document.querySelector('.offer__slider-prev'),
        nextSlide = document.querySelector('.offer__slider-next'),
        offerSlide = document.querySelectorAll('.offer__slide'),
        current = 0,
        total = 0,
        currentEl = document.querySelector('#current'),
        totalEl = document.querySelector('#total');

    function sliderInit() {
        total = offerSlide.length -1;
        if(offerSlide.length < 10) {
            totalEl.innerHTML = `0${total +1}`;
        } else {
            totalEl.innerHTML = `${total +1}`;
        }
        currentEl.innerHTML = `0${current + 1}`;
        hideAllSlides();
        offerSlide[0].classList.remove('hide');
        offerSlide[0].classList.add('show');
    }
    sliderInit();
    function hideAllSlides() {
        for(let item of offerSlide) {
            item.classList.remove('show');
            item.classList.add('hide');
        }
    }
    function nextSlideRun() {
        hideAllSlides();
        current++;
        if(current > total) {
            current = 0;
            console.log(`Current: ${current}, type:${typeof current}`);
        }
        offerSlide[current].classList.remove('hide');
        offerSlide[current].classList.add('show');
        compareCurrent();
    }
    function prevSlideRun() {
        hideAllSlides();
        current--;
        if(current < 0) {
            current = total;
        }
        offerSlide[current].classList.add('show');
        offerSlide[current].classList.remove('hide');
        compareCurrent();
    }
    function compareCurrent() {
        if(current >= 10) {
            currentEl.innerHTML = `${current +1}`;
        } else {
            currentEl.innerHTML = `0${current +1}`;
        }
    }
    nextSlide.addEventListener('click', nextSlideRun);
    prevSlide.addEventListener('click', prevSlideRun);*/

    const slides = document.querySelectorAll('.offer__slide'),
        // slider = document.querySelector('.offer__slider-inner'),
        prev = document.querySelector('.offer__slider-prev'),
        next = document.querySelector('.offer__slider-next'),
        total = document.querySelector('#total'),
        current = document.querySelector('#current'),
        sliderWrapper = document.querySelector('.offer__slider-wrapper'),
        slidesField = document.querySelector('.offer__slider-inner'),
        width = window.getComputedStyle(sliderWrapper).width;
    let slideIndex = 1;
    let offset = 0;

    if (slides.length < 10) {
        total.textContent = `0${slides.length}`;
        current.textContent = `0${slideIndex}`;
    } else {
        total.textContent = slides.length;
        current.textContent = slideIndex;
    }

    slidesField.style.width = 100 * slides.length + '%';
    slidesField.style.display = 'flex';
    slidesField.style.transition = '0.5s all';

    sliderWrapper.style.overflow = 'hidden';

    slides.forEach(slide => {
        slide.style.width = width;
    });

    // slider.style.position = 'relative';

    const indicators = document.createElement('ol'),
        dots = [];
    indicators.classList.add('carousel-indicators');
    sliderWrapper.append(indicators);
    for (let i = 0; i < slides.length; i++) {
        const dot = document.createElement('li');
        dot.setAttribute('data-slide-to', i + 1);
        dot.classList.add('dot');
        indicators.append(dot);
        if (i == 0) {
            dot.style.opacity = 1;
        }
        dots.push(dot);
    }

    next.addEventListener('click', () => {
        if (offset == parseInt(width) * (slides.length - 1)) {
            offset = 0;
        } else {
            offset += parseInt(width); //+width.slice(0, width.length-2);
        }
        slidesField.style.transform = `translateX(-${offset}px)`;

        if (slideIndex == slides.length) {
            slideIndex = 1;
        } else {
            slideIndex++;
        }

        if (slides.length < 10) {
            current.textContent = `0${slideIndex}`;
        } else {
            current.textContent = slideIndex;
        }
        dots.forEach(dot => dot.style.opacity = '0.5');
        dots[slideIndex - 1].style.opacity = 1;
    });

    prev.addEventListener('click', () => {
        if (offset == 0) {
            offset = parseInt(width) * (slides.length - 1);
        } else {
            offset -= parseInt(width); //+width.slice(0, width.length-2);
        }
        slidesField.style.transform = `translateX(-${offset}px)`;

        if (slideIndex == 1) {
            slideIndex = slides.length;
        } else {
            slideIndex--;
        }
        if (slides.length < 10) {
            current.textContent = `0${slideIndex}`;
        } else {
            current.textContent = slideIndex;
        }
        dots.forEach(dot => dot.style.opacity = '0.5');
        dots[slideIndex - 1].style.opacity = 1;
    });

    dots.forEach(dot=>{
        dot.addEventListener('click', e=>{
            const slideTo = e.target.getAttribute('data-slide-to');
            slideIndex = +slideTo;

            offset = parseInt(width) * (slideTo - 1);

            slidesField.style.transform = `translateX(-${offset}px)`;

            if (slides.length < 10) {
                current.textContent = `0${slideIndex}`;
            } else {
                current.textContent = slideIndex;
            }

            dots.forEach(dot => dot.style.opacity = '0.5');
            dots[slideIndex - 1].style.opacity = 1;

        })
    })
    //dots
    /*let indicators = document.createElement('div');
    indicators.classList.add('carousel-indicators');
    sliderWrapper.append(indicators);
    for(let i = 0; i< slides.length; i++) {
        let newDot = document.createElement('div');
        newDot.classList.add('dot');
        newDot.setAttribute('data-dot', i+1);
        indicators.append(newDot);
    }
    sliderWrapper.addEventListener('click', e=>{
        let target = e.target;
        if(target.classList.contains('dot')) {
            let dataAttr = target.dataset.dot;
            if(slideIndex !== +dataAttr) {
                slideIndex = +dataAttr;
                    offset = parseInt(width) * +dataAttr;
                slidesField.style.transform = `translateX(${-offset}px)`;

                if(slides.length < 10) {
                    current.textContent = `0${slideIndex}`;
                } else {
                    current.textContent = slideIndex;
                }
            }
        }
    })*/

    //end of slider
});