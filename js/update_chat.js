var ot_id_box = document.getElementById("outgoing_id");
var in_id_box = document.getElementById("incoming_id");

var data = {"ot_id":ot_id_box.value,"in_id":in_id_box.value}
var jsonString = JSON.stringify(data);


setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/update_chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data1 = xhr.response;
                console.log(data1);
        }
    }
}    
    let formData = new FormData(form);
    xhr.send(formData);
},200)
