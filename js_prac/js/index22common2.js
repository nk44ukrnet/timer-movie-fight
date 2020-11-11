function myModule() {
    this.hello = function () {
        console.log('hllo');
    };
    this.goodbye = function () {
        console.log('bb');
    };
}

module.exports = myModule();