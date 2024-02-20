let number = Math.round(Math.random() * 100);
console.log(number);

let checkNumber = new Promise((a, b) => {
    if (number > 80) {
        return a("congrats")
    }
    else {
        return b("better luck next time")
    }
})
    .then((c) => { console.log(c) })
    .catch((c) => { console.log(c) })

