const forms =document.getElementById("create-post")
const inputs =forms.querySelector("input")
const Btn =forms.querySelector("button")

const image = document.querySelector('#image')

inputs.addEventListener('keyup',()=>{
    // console.log(inputs.value.length);
    if (inputs.value.length != 0 ) {

        // console.log("inputs 3amra");
        Btn.removeAttribute('disabled')
        Btn.style.backgroundColor='rgb(250, 67, 35)'
        Btn.style.color='white'
        Btn.style.cursor='pointer'
    }else if (inputs.value.length == 0) {

        // console.log("inputs khawi");   
        Btn.setAttribute('disabled',"disabled")
        Btn.style.backgroundColor='rgb(255, 154, 136)'   
        Btn.style.color='rgb(98, 97, 97)'
        Btn.style.cursor='default'
    }
})

const file = document.querySelector("#file")
const span = document.querySelector('#span')
const success = document.querySelector('.successfully')

file.addEventListener('click',()=>{
        // console.log("file");        
        image.click();
})
image.addEventListener('change',()=>{ 
    if (image.value) {
        span.textContent=image.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1]
        Btn.removeAttribute('disabled')
        Btn.style.backgroundColor='rgb(250, 67, 35)'
        Btn.style.color='white'
        Btn.style.cursor='pointer'        
    }
})



forms.addEventListener("submit", (e)=>{
    e.preventDefault();
    console.log('submit')
})

Btn.onclick= ()=>{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/post.php", true);
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.responseText;
                // console.log(data)
                    
                    inputs.value="";
                    success.textContent = data;
                    success.style.display = "block";
                    setTimeout(() => {
                        window.location.reload()
                        success.style.display = "none";
                    }, 500);
                
            }
        }
    }
    let formData = new FormData(forms);
    xhr.send(formData);

}
