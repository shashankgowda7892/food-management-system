
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var totalprice = document.getElementsByClassName('totalprice');
var gtotal = document.getElementById('gtotal');
var ftotal = document.getElementById('ftotal');
var f_total = document.getElementById('f_total');
var g_total = document.getElementById('g_total');
var pay_method = document.getElementsByName('pay_method');
var trans_id = document.getElementsByName('trans_id');
var gt=0;
function subtotal() {
    gt=0;
    for (i = 0; i < iprice.length; i++) { 
        totalprice[i].innerText = (iprice[i].value) * (iquantity[i].value);
        gt= gt+(iprice[i].value) * (iquantity[i].value);
    }
    gtotal.innerText = gt;
    g_total.value = gt;
    ftotal.innerText = gt+25;
    f_total.value =gt+25;
}

subtotal();


function toggle() {
    var radiovalue = document.querySelector('input[name="pay_method"]:checked').value;
    var trans_id = document.getElementById('trans_id');

    if(radiovalue == "COD"){
        trans_id.style.display = "none";
    }
    else if(radiovalue == "UPI"){
        trans_id.style.display = "block";
    }
    
}

toggle();
