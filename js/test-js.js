"{use strict"

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