const counterObject = require('./myscript');

console.log(counterObject.getCounter());
console.log(counterObject.incrementCounter());
console.log(counterObject.getCounter());

const newCounterObject = require('./myscript');

console.log(newCounterObject.getCounter());