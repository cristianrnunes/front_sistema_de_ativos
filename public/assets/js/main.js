// window.onload = function () {
//     JsBarcode(".barcode").init();
// }

function geraCodigoDeBarras(){
     let val = $("#inputValue").val();

    /*A função JsBarcode não aceita string vazia*/
    if(!val.value){
        val.value = 0;
    }

    JsBarcode($('#codBarras'), val.value);
}