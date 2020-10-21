let numberOfFilms = prompt('How many films have you wathced?', '');

const personalMovieDb = {
    count: numberOfFilms,
    movies: {},
    actors: {},
    genres: [],
    privat: false
};

let question1 = prompt('Enter name of latest film you have watched', '');
let question2 = prompt('Rate this film', '');

let qeustion3 = prompt('Enter name of latest film you have watched', '');
let question4 = prompt('Rate this film', '');

personalMovieDb.movies[question1] = question2;
personalMovieDb.movies[qeustion3] = question4;
