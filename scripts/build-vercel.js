const fs = require('fs');
const path = require('path');

const source = path.join(__dirname, '..', 'portfolio-static');
const dest = path.join(__dirname, '..', 'dist');

fs.rmSync(dest, { recursive: true, force: true });
fs.cpSync(source, dest, { recursive: true });

console.log('Copied portfolio-static to dist for Vercel deploy.');
