const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); 
}

sendBtn.onclick = ()=>{
    //Ajax
    let xhr = new XMLHttpRequest();     //creating XML obj
    xhr.open("POST","php-backend/insert-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
               inputField.value = ""; //once msg inserted in db, field should be empty
               scrollToBottom();
            }
        }
    }

    //sending form data through ajax
    let formData = new FormData(form);
    xhr.send(formData); // to php
}

chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}


setInterval(()=>{
    //Ajax
    let xhr = new XMLHttpRequest();     //creating XML obj
    xhr.open("POST","php-backend/get-chat.php",true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          chatBox.innerHTML = data;
          if(!chatBox.classList.contains("active")){
            scrollToBottom();
          }
        }
      }
    }

    //sending form data through ajax
    let formData = new FormData(form);
    xhr.send(formData); // to php

},500);   //this will run frequently after 500ms


function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}