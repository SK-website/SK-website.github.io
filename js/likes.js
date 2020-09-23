"use strict"

let likesTotal = document.querySelector('.like-me');
let likesCounter=0;

let hearts = document.querySelectorAll('.fa-thumbs-up');

    
for (let heart of hearts) {

    heart.onclick = function () {
        if (heart.classList.contains('added')) {
            +(likesTotal.textContent)--; 
        } else {
            +(likesTotal.textContent)++;
            
        }
        heart.classList.toggle('added');
    }
}


   
