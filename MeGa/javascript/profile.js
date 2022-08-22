const a=document.querySelectorAll('.nav-profile a'),
content=document.querySelector('.content')

for (var i = 0; i < a.length; i++) {
    a[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active-profile");
    current[0].className = current[0].className.replace("active-profile", "");
    this.className += " active-profile";
    });
}
a.forEach(element => {
    element.onclick=()=>{
        // console.log(element.textContent);
        if (element.textContent == "About") {
            
            document.getElementById('Publications').style.display="none";
            document.getElementById('About').style.display="block";
        }
        if (element.textContent == "Publications") {
            window.location.reload()
        }
        if (element.textContent == "Photos") {
            document.getElementById('Publications').style.display="none";
            document.getElementById('About').style.display="none";
        }
    }
});
const Modify=document.getElementById('Modify')
const input=document.querySelectorAll('table tr td input')

const successfully=document.getElementsByClassName('successfully')[1]

const form=document.getElementById('info'),
btn=document.getElementById('btn-up')

Modify.addEventListener('click',()=>{
    
    input.forEach(element => {
        element.removeAttribute('disabled')
    });
    input[0].focus()
    btn.style.backgroundColor=' hsl(214, 89%, 52%)'
    btn.style.color='black'
})

form.onsubmit=(e)=>{
    e.preventDefault()
}
btn.onclick = ()=>{
    // console.log('clicked');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/modify.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    successfully.style.display = "block";
                    successfully.textContent = data;
                    setTimeout(() => {
                        window.location.reload()
                        successfully.style.display = "none";
                    }, 2000);
                
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

let butEdit=document.getElementById('but-edit');
let inputEdit=document.getElementById('edit');
let formPic=document.getElementById('edite-pic');


butEdit.addEventListener('click',()=>{
    inputEdit.click();
});

inputEdit.addEventListener('change',()=>{
    // console.log('change'+ inputEdit.value);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/modifyPic.php", true);
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.responseText;
                console.log(data)
                if (data == "Profile Edit successfully") {
                    window.location.reload()
                }
                if (data !== "Profile Edit successfully") {
                    alert(data)
                    window.location.reload()
                }
                
            }
        }
    }
    let formData = new FormData(formPic);
    xhr.send(formData);

})

const delet=document.querySelectorAll('#delete');
const id=document.querySelectorAll('#id-post');


for (let i = 0; i < delet.length; i++) {
    const element = delet[i];
    element.addEventListener('click',()=>{
        console.log(id[i].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST","php/delete.php?post_id="+id[i].value, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.responseText;
                    console.log(data)
                    window.location.reload()
                    
                }
            }
        }
        xhr.send();
    })
}

