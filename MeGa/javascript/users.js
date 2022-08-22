

// setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "php/users.php", true);
//     xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//         if(xhr.status === 200){
//             let data = xhr.response;
//             if(!searchBar.classList.contains("active")){
//             usersList.innerHTML = data;
//         }
//         }
//     }
//     }
//     xhr.send();
// }, 500);
const form=document.getElementById('chatForm'),
input=form.querySelector('input'),
butt=form.querySelector('button')

// input.addEventListener('keypress',()=>{
//     if (input.value.length!==0)  {
        
//         butt.removeAttribute('disabled')
//         butt.style.backgroundColor='red'
//     }else if(input.value.length===0){
//         butt.setAttribute('disabled','disabled')
//         butt.style.backgroundColor='tomato'
//     }
// })
form.onsubmit=(e)=>{
    e.preventDefault()
}
    
butt.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
                input.value = "";
        }
    }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}










const ul=document.querySelectorAll(".left-panel ul li")

for (let i = 0; i < ul.length; i++) {
    const element = ul[i];
    element.addEventListener('click',()=>{
        document.getElementById('select').style.display="none";
        
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "php/get-chat.php?user_id="+element.value, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    document.getElementById('globalmsgs').style.display="block";
                    document.getElementById('nav').innerHTML=data
                    // console.log(data);
                }
            }
        }
        xhr.send();
    })

form.onsubmit=(e)=>{
    e.preventDefault()
}
    
butt.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/insert-chat.php?user_id="+element.value, true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
                input.value = "";
                console.log(xhr.response);
        }
    }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

}