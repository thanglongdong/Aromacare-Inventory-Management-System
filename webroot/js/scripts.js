/*!
* Start Bootstrap - Shop Homepage v5.0.3 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
var myCounter = function() {
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;

            // Lower inc to slow and higher to slow
            const inc = 1;

            // console.log(inc);
            // console.log(count);
            // Check if target is reached
            if (count < target) {
                // Add inc to count and output in counter
                counter.innerText = count + inc;
                // Call function every ms
                setTimeout(updateCount, 1000/target);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
}

const counters = document.querySelectorAll('.counter');
const speed = 200; // The lower the slower

myCounter();
