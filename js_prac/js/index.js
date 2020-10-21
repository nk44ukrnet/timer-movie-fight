let numberOfFilms = '';
while(!numberOfFilms) {
    numberOfFilms = prompt('How many films have you wathced?', '');
}

const personalMovieDb = {
    count: numberOfFilms,
    movies: {},
    actors: {},
    genres: [],
    privat: false
};

let q1 = '',
    q2 = '',
    q3 = '',
    q4 = '';

while (!q1) {
    q1 = prompt('Enter name of latest film you have watched', '');
}
while (!q2) {
    q2 = prompt('Rate this film', '');
}
while (!q3) {
    q3 = prompt('Enter name of latest film you have watched', '');
}
while (!q4) {
    q4 = prompt('Rate this film', '');
}

personalMovieDb.movies[q1] = q2;
personalMovieDb.movies[q3] = q4;

console.log(personalMovieDb.movies);