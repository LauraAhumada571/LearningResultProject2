function viewMore(button){
    var idLearningResult = button.getAttribute('lr');
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'LearningResult/getLearningResultById/' + idLearningResult;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);
            if(objData.status){
                document.querySelector("#titleLRModal").innerHTML = objData.msg.descripcion;
                document.querySelector("#descriptionLRModal").innerHTML = objData.msg.detalle;
            } else {
                swal("Error", objData.msg, "error");
            }
        } 
    }
    $('#learningResultModal').modal('show');
}