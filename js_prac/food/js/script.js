import tabs from './modules/tabs';
import modal, {openModal} from './modules/modal';
import slider from './modules/slider';
import cards from './modules/cards';
import timer from './modules/timer';
import calculator from './modules/calculator';
import forms from './modules/forms';

document.addEventListener('DOMContentLoaded', () => {
    const modalTimerId = setTimeout(() => openModal('.modal', modalTimerId), 15000);

    tabs('.tabheader__item', '.tabcontent', '.tabcontainer', 'tabheader__item_active');
    modal('[data-modal]', '.modal', modalTimerId);
    slider();
    cards();
    timer('.timer', '2020-11-15');
    calculator();
    slider({
        nextArrow: '.offer__slider-next',
        prevArrow: '.offer__slider-prev',
        totalCounter: '#total',
        currentCounter: '#current',
        wrapper: '.offer__slider-wrapper',
        field: '.offer__slider-inner'
    });
    forms(modalTimerId, 'form');

});