function viewPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function onlyNumberKey(evt) {

    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
function onlyAlphabetKey(evt){
    return (event.charCode > 64 &&
        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)
}

function RemoveSpecialChar(rsc){
    var char = event.which;
    if(char > 31 && char != 32 && (char<65 || char>90) && (char < 97 || char > 122)){
        return false;
    }
}