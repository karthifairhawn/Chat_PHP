var form = document.getElementById("msg-form");
var messageBox = document.getElementById("send-msg")
var sendButton = document.getElementById("send-msg-btn");


form.onsubmit=(e)=>{
    e.preventDefault();
}



window.onload = function(){
    sendButton.onclick = ()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST","php/chat.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    messageBox.value ="";
                    console.log(data);
            }
        }
    }   
        let formData = new FormData(form);
        xhr.send(formData);
    }
}