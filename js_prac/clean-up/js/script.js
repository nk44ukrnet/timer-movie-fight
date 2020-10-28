/* Задания на урок:

1) Удалить все рекламные блоки со страницы (правая часть сайта)

2) Изменить жанр фильма, поменять "комедия" на "драма"

3) Изменить задний фон постера с фильмом на изображение "bg.jpg". Оно лежит в папке img.
Реализовать только при помощи JS

4) Список фильмов на странице сформировать на основании данных из этого JS файла.
Отсортировать их по алфавиту 

5) Добавить нумерацию выведенных фильмов */

'use strict';

const movieDB = {
    movies: [
        "Логан",
        "Лига справедливости",
        "Ла-ла лэнд",
        "Одержимость",
        "Скотт Пилигрим против..."
    ]
};

//sort movies



//remove ads
const promoImg = document.querySelectorAll('.promo__adv img');
promoImg.forEach( (item) => {
   item.remove();
});
// const promoAdv = document.querySelector('.promo__adv');
// promoAdv.remove();

//change genre
const genre = document.querySelector('.promo__genre');
genre.innerText = 'драма'.toUpperCase();

//change promo bg
const promoBg = document.querySelector('.promo__bg');
promoBg.style.background = 'url(img/bg.jpg) center center/cover no-repeat';

//list of films from js
let listItemFilm = document.querySelectorAll('.promo__interactive-item');
listItemFilm.forEach(function (item, num) {
   item.innerText =  `${num+1}. ${movieDB.movies[num]}`;
});

//extra1
const inp = document.querySelector('.adding__input'),
    submit = document.querySelector('button'),
    promoUl = document.querySelector('.promo__interactive-list');

submit.addEventListener('click', function (e) {
    e.preventDefault();
let currentVal = inp.value;
let checkBoxYes = document.querySelector('input[type="checkbox"]');

if(currentVal.trim().innerText !== '') {
    if(currentVal.length > 21) {
        currentVal = currentVal.slice(0,21) + '...';
    }
    // promoUl.innerHTML += addToUlList(currentVal);
    movieDB.movies.push(currentVal);
    reRenderMovieDb();

    if(checkBoxYes.checked) {
        console.log('Adding favorite film');
    }
}
    inp.value = '';
    checkBoxYes.checked = false;
});

// function addToUlList(name) {
//  return ` <li class="promo__interactive-item">${name}
//                             <div class="delete"></div>
//                         </li>`
// }
function reRenderMovieDb() {
    const {movies} = movieDB;
    promoUl.innerHTML = '';
    movieDB.movies.sort();
    for(let i = 0; i < movies.length; i++) {
        promoUl.innerHTML += `
    <li class="promo__interactive-item" data-number="${i}">${[i+1]}. ${movies[i]}
                            <div class="delete"></div>
                        </li>
    `;
    }
}
reRenderMovieDb();

//del item
promoUl.addEventListener('click', function (event) {
    if(event.target.classList.contains('delete')) {
        console.log('yes');
        let filmNum = event.target.parentElement.dataset.number;
        movieDB.movies.splice(filmNum, 1);
        event.target.parentElement.remove();
        reRenderMovieDb();
    }
    // const delItem = document.querySelectorAll('.delete');
    // delItem.forEach(curEl => {
    //     curEl.addEventListener('click', function (e) {
    //         let filmNum = curEl.parentElement.dataset.number;
    //         movieDB.movies.splice(filmNum, 1);
    //         curEl.parentElement.remove();
    //         reRenderMovieDb();
    //     })
    //});
});
