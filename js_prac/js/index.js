let numberOfFilms;





const personalMovieDb = {
    count: numberOfFilms,
    movies: {},
    actors: {},
    genres: [],
    privat: false,
    start() {
        numberOfFilms = +prompt('How many films have you watched?', '');
        while(numberOfFilms == ''
        || numberOfFilms == null
        || isNaN(numberOfFilms)) {
            numberOfFilms = +prompt('How many films have you watched?', '');
        }
    },
    toggleVisibleMyDb(){
        (this.privat === true) ? this.privat = false : this.privat = true;
    },
    rememberMyFilms() {
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
    },
    writeYourGenres() {
        let data = '';
        for(let i = 1; i <= 3; i++) {
            data = prompt(`Write your favorite genres nubmer: ${i}`);
            if(data === '' || data === null) {
                i--;
            } else {
                personalMovieDb.genres.push(data);
            }
            console.log(personalMovieDb.genres);

        }
    },
    detectPersonalLevel() {
        if (check < 10) {
            console.log('You have watched little amout of films');
        } else if (check >= 10 && check < 30) {
            console.log('You are typical film watcher');
        } else if (check >= 30) {
            console.log('You are film lover!!! For sure!')
        } else {
            console.log('There is an error with rating');
        }
    },
    writeYourGenres() {
        let data = '';
        for(let i = 1; i <= 3; i++) {
            data = prompt(`Write your favorite genres nubmer: ${i}`);
            if(data === '' || data === null) {
                i--;
            } else {
                personalMovieDb.genres.push(data);
            }
            console.log(personalMovieDb.genres);

        }
    },
    showMyDb(hidden) {
        if(!hidden) {
            console.log(personalMovieDb)
        } else {
            return;
        }
    }
};
personalMovieDb.start();
let q1 = '',
    q2 = '',
    q3 = '',
    q4 = '';



personalMovieDb.rememberMyFilms();

personalMovieDb.movies[q1] = q2;
personalMovieDb.movies[q3] = q4;

let check = +personalMovieDb.count;



personalMovieDb.detectPersonalLevel();


personalMovieDb.showMyDb(personalMovieDb.privat);

personalMovieDb.writeYourGenres();

personalMovieDb["genres"].forEach(function (item, num) {
   console.log(`Beloved genre #${num+1}: ${item}`);
});

console.log(personalMovieDb);

