let numberOfFilms = '';
while(!numberOfFilms) {
    numberOfFilms = prompt('How many films have you watched?', '');
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

while (!q1 || q1.length > 50) {
    q1 = prompt('Enter name of latest film you have watched', '');
}
while (!q2) {
    q2 = prompt('Rate this film', '');
}
while (!q3 || q3.length > 50) {
    q3 = prompt('Enter name of latest film you have watched', '');
}
while (!q4) {
    q4 = prompt('Rate this film', '');
}

personalMovieDb.movies[q1] = q2;
personalMovieDb.movies[q3] = q4;

let check = +personalMovieDb.count;
if (check < 10) {
    alert('You have watched little amout of films');
} else if (check >= 10 && check < 30) {
    alert('You are typical film watcher');
} else if (check >= 30) {
    alert('You are film lover!!! For sure!')
} else {
    alert('There is an error with rating');

}

console.log(personalMovieDb);

