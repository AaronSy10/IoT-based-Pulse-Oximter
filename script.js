
function addData()
{
    var table = document.getElementById("data-table");

    //new entry
    var newData = table.insertRow(-1);

    //data
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var clock = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    var day = newData.insertCell(0);
    var time = newData.insertCell(1);
    var pulse = newData.insertCell(2);
    var blood = newData.insertCell(3);
    var remark = newData.insertCell(4);

    day.innerHTML = date;
    time.innerHTML = clock;
    pulse.innerHTML = "test";
    blood.innerHTML = "working";
    remark.innerHTML = "Good";
}

function removeData()
{
    document.getElementById("data-table").deleteRow(-1);
}