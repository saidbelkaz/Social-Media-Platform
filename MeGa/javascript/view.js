let drop=document.getElementById('drop');
let menu=document.getElementById('menu');


drop.addEventListener("mouseenter",()=>{
    // console.log('mouseenter');
    menu.style.display="block";
});

drop.addEventListener("mouseleave",()=>{
    // console.log('mouseleave');
    menu.style.display="none";
})

