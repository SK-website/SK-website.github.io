"use strict"

let obj = {
    name: "Hello"
}
console.dir(document.body);
console.dir (obj._proto_);

console.dir(obj.name);

console.dir(document.body.bgColor)


document.body.style.color = "white";
document.body.style.backgroundColor = "yellow";

console.dir(document.body.style.color);
let h1 = document.getElementById("head1");
h1.style.fontSize = "4rem"
console.dir(h1)
let div = document.getElementsByTagName("div");
div[0].style.color="green";
console.dir(div)



function myF () {
    h1.style.fontSize = '5rem';
}
h1.onclick = myF;

/*let arr=  [1,2,3, true, "hello", [2,3,4], {test:"this is text"},,,,,,,34,,,,55,,,,888];

console.dir(arr[5][1]);
console.dir(arr[6]['test']);
console.dir(arr.length);

arr.length = 1000;
arr[arr.length-1]= "last";
console.dir(arr.length);
console.dir(arr[arr.length-1]);
arr[3]= undefined;*/

/*удалить значение - получим underfind*/
let arr=  [1,2,3, true, "hello", [2,3,4], {test:"this is text"},,,,,,,34,,,,55,,,,888];
for (let i=0; i<arr.length; i++) {
console.log(arr[i])};


let divs=document.getElementsByTagName('div');
 let i=0;
 do {
     console.log(divs[i]);
     i++;} while (i<divs.length)
 

 while(1<div.length){
     console.log(divs[i]);
     i++;
 }