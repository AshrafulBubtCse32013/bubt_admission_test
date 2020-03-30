<script src="assets/javascripts/theme.js"></script>
<script src="assets/javascripts/theme.custom.js"></script>
<script src="assets/javascripts/theme.init.js"></script>
<script src="assets/javascripts/forms/examples.advanced.form.js"></script>
<script>
function printDiv() {
    var divToPrint = document.getElementById('DivIdToPrint');
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
    newWin.document.write(
        '<html><head><link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css"><link rel="stylesheet" href="assets/stylesheets/theme-custom.css"></head><body onload="window.print()">' +
        divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    // setTimeout(function(){newWin.close();},10);
    return false;
}

function print_css($id) {
    var divToPrint = document.getElementById($id);
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
    newWin.document.write(
        '<html><head><link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css"></head><body onload="window.print()">' +
        divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    // setTimeout(function(){newWin.close();},10);
    return false;
}
</script>