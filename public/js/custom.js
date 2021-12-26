function checkButton(id) {
    var x = document.getElementById(id);
    // console.log(id);
    if (x.style.backgroundColor == "blue") {
        x.style.backgroundColor = "";
        x.style.color = "";
        x.classList.remove("checked");
        x.classList.add("unchecked");
    } else {
        x.classList.remove("unchecked");
        x.classList.add("checked");
        x.style.backgroundColor = "blue";
        x.style.color = "white";
    }
    checkLogics();
    generateJSONString();
}

function checkLogics(){
    document.getElementById("sec1-logic").setAttribute("class", "btn btn-secondary btn-block");
    document.getElementById("sec2-logic").setAttribute("class", "btn btn-secondary btn-block");
    document.getElementById("sec3-logic").setAttribute("class", "btn btn-secondary btn-block");
    btns = document.querySelectorAll(".checked");
    btns.forEach(x => {
        if(x.classList.contains("section1")){
            sec = document.getElementById("sec1-logic");
            sec.classList.remove("btn-secondary");
            sec.classList.add("btn-info");
        }
        else if(x.classList.contains("section2")){
            sec = document.getElementById("sec2-logic");
            sec.classList.remove("btn-secondary");
            sec.classList.add("btn-info");
        }
        else if(x.classList.contains("section3")){
            sec = document.getElementById("sec3-logic");
            sec.classList.remove("btn-secondary");
            sec.classList.add("btn-info");
        }
    });
}

function generateJSONString(){
    // Get all checked buttons
    let batch = document.querySelectorAll('.checked');
    let JSON_batch = {};
    batch.forEach(x => {
        JSON_batch[x.getAttribute("value")] = x.getAttribute("value");
    });
    // convert JSON object to string
    const data = JSON.stringify(JSON_batch);

    //set JSON String Input
    var JSONstring = document.getElementById("JSON-string");
    JSONstring.setAttribute("value", data);
}

function loadSheet(){
    // alert("heer");
    // alert($('#exampleInputFile').val());
    $.ajax({
        url     : '/loadfile',
        type    : 'get',
        data    : 'file='+$('#exampleInputFile').val(),
        success : function( result ) {
                     alert('Submitted');
                     console.log(result);
        },
        error   : function( xhr, err ) {
                     alert('Error');     
        }
    });
}

function loadModel() {
    var table = document.getElementById('tbl');
    for (let i = 0; i < 11; i++) {
        var label = document.createElement('td');
        label.setAttribute("class", "lbl");
        label.innerHTML = "Label " + (i + 1);
        var row = document.createElement('tr');
        row.append(label);
        row.append(document.createElement('td'));
        for (let j = 0; j < 3; j++) {
            var col = document.createElement('td');
            for (let k = 0; k < 6; k++) {
                var btn = document.createElement('input');
                var btnId = "lbl" + i + "-sec" + j + "-btn" + k;
                btn.setAttribute("type", "button");
                btn.setAttribute("value", btnId.toUpperCase());
                btn.setAttribute("name", btnId);
                btn.setAttribute("id", btnId);
                btn.setAttribute("class", "unchecked");
                btn.setAttribute("onClick", "checkButton('" + btnId + "')");
                btn.style.border = "solid 1px gray";
                btn.style.fontWeight = 700;
                btn.style.cursor = "pointer";
                col.append(btn);
            }
            row.append(col);
        }
        table.append(row);
    }
}
function sendBatch() {
    let batch = document.querySelectorAll('.checked');
    let JSON_batch = {};
    batch.forEach(x => {
        JSON_batch[x.getAttribute("value")] = x.getAttribute("value");
    });
    // convert JSON object to string
    const data = JSON.stringify(JSON_batch);

    // console.log(data);
    var blob = new Blob([data], {
        //type: 'application/json'
        type: 'octet/stream'
    });
    // console.log(blob);
    var anchor = document.createElement('a')
    anchor.download = "batch.json";
    anchor.href = window.URL.createObjectURL(blob);
    anchor.innerHTML = "download"
    anchor.click();

    console.log("JSON data is saved.");
}

$('#inputGroupFile02').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
