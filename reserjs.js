// const type = document.getElementById('type');
// const prixnuit = document.getElementById('prixnuit');

// const tout = {
//     normal:250,
//     mediom:700,
//     vip:1000,
// }

// type.addEventListener("change" , function(){
//     if(tout[type.value]){
//         prixnuit.value= tout[type.value] + "dh";
//     }
//     else{
//         prixnuit.value= "";
//     }
// })

// const type = document.getElementById('type');
// const prixnuit = document.getElementById('prixnuit');
// const prixtotal = document.getElementById('prixtotal');
// const datedepart = document.getElementById("depart");
// const datefin = document.getElementById("fin");
// const tout = {
//     normal:250,
//     mediom:700,
//     vip:1000,
// }

// function total(){
//     const depart = new Date(datedepart);
//     const fin = new Date(datefin);
//     const prix = parseFloat.tout[type.value];

//     if(!isNaN(depart) && !isNaN(fin) && prix > 0){
//         const date = depart - fin;
//         const toutdate = date / (1000*60*60*24);
//     }
//     if(toutdate > 0){
//         prixnuit.value= prix;
//         datefin.value = toutdate * prixnuit;

//     }else{

//     }
//     prtypeix.addEventListener("change", total);
//     datedepart.addEventListener("change", total);
//     datefin.addEventListener("change", total);
// }
