#!/usr/bin/env node

const fs = require('fs');
const util = require('util');
const path = require('path');
// const chalk = require ('chalk');

// const lstat = util.promisify(fs.lstat);

// console.log(process.argv);
const targetDir = process.argv[2] || process.cwd();

const {lstat} = fs.promises;
fs.readdir(targetDir, async (err, filenames) => {
    if (err) {
        console.log(err);
    }

    const statPromises = filenames.map(filename=> {
        return lstat(path.join(targetDir, filename));
    });

    const allStats = await Promise.all(statPromises);
    for(let stats of allStats) {
        const index = allStats.indexOf(stats);

        console.log(filenames[index], stats.isFile());
    }
    // for (let filename of filenames) {
    //     try {
    //         const stats = await lstat(filename);
    //         console.log(filename, stats.isFile());
    //     } catch (err) {
    //         console.log(err);
    //     }
    // }
});
