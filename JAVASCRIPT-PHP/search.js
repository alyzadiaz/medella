const forms = document.getElementsByClassName("id-form");

for(const element of forms){
    element[0].onclick = function(){
        console.log("submitting");
        element[1].submit();
    }
}