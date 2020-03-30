<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">2018 &copy; Copyright <a class="text-bold-800 grey darken-2"
                href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More
                    themes</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank">
                    Support</a></li>
            <li class="list-inline-item"><a class="my-1"
                    href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/"
                    target="_blank"> Purchase</a></li>
        </ul>
    </div>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<?php if ($type === 'dashboard') : ?>
<!-- <script src="assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script> -->
<!-- <script src="assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script> -->
<?php endif; ?>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CHAMELEON  JS-->
<script src="assets/js/core/app-menu-lite.js" type="text/javascript"></script>
<script src="assets/js/core/app-lite.js" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->

<?php if ($type === 'all_question' || $type === 'individual') : ?>
<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<!-- <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script> -->

<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
<?php endif; ?>

<?php if ($type === 'add_question' || $type === 'edit_qus') : ?>
<script src="assets/js/tinymce/tinymce.min.js"></script>
<script src="assets/js/tinymce/jquery.tinymce.min.js"></script>
<script>
$('textarea#question').tinymce({
    /* width and height of the editor */
    width: "100%",
    height: 300,

    /* display statusbar */
    statubar: true,

    external_plugins: {
        tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js'
    },
    /* plugin */
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table directionality emoticons template paste"
    ],

    /* toolbar */
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry",
    branding: false,
    /* style */
    style_formats: [{
            title: "Headers",
            items: [{
                    title: "Header 1",
                    format: "h1"
                },
                {
                    title: "Header 2",
                    format: "h2"
                },
                {
                    title: "Header 3",
                    format: "h3"
                },
                {
                    title: "Header 4",
                    format: "h4"
                },
                {
                    title: "Header 5",
                    format: "h5"
                },
                {
                    title: "Header 6",
                    format: "h6"
                }
            ]
        },
        {
            title: "Inline",
            items: [{
                    title: "Bold",
                    icon: "bold",
                    format: "bold"
                },
                {
                    title: "Italic",
                    icon: "italic",
                    format: "italic"
                },
                {
                    title: "Underline",
                    icon: "underline",
                    format: "underline"
                },
                {
                    title: "Strikethrough",
                    icon: "strikethrough",
                    format: "strikethrough"
                },
                {
                    title: "Superscript",
                    icon: "superscript",
                    format: "superscript"
                },
                {
                    title: "Subscript",
                    icon: "subscript",
                    format: "subscript"
                },
                {
                    title: "Code",
                    icon: "code",
                    format: "code"
                }
            ]
        },
        {
            title: "Blocks",
            items: [{
                    title: "Paragraph",
                    format: "p"
                },
                {
                    title: "Blockquote",
                    format: "blockquote"
                },
                {
                    title: "Div",
                    format: "div"
                },
                {
                    title: "Pre",
                    format: "pre"
                }
            ]
        },
        {
            title: "Alignment",
            items: [{
                    title: "Left",
                    icon: "alignleft",
                    format: "alignleft"
                },
                {
                    title: "Center",
                    icon: "aligncenter",
                    format: "aligncenter"
                },
                {
                    title: "Right",
                    icon: "alignright",
                    format: "alignright"
                },
                {
                    title: "Justify",
                    icon: "alignjustify",
                    format: "alignjustify"
                }
            ]
        }
    ]
});

$(document).ready(function() {
    var next = 1;
    $(".add-more").click(function(e) {
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input value="' + (next - 1) + '" class="check' + (next - 1) + '" id="check' + (
                next - 1) + '" type="checkbox" name="checkcorr[]"><small id="mss' + (next - 1) +
            '"> If correct ans :) check me</small><input autocomplete="off" class="form-control" id="field' +
            next + '" name="option_name[]" type="text">';
        var newInput = $(newIn);
        var removeBtn = '';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source', $(addto).attr('data-source'));
        $("#count").val(next);
        $('.remove-me').click(function(e) {
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length - 1);
            var fieldID = "#field" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
            var checkID = this.id.charAt(this.id.length - 1);
            var checkID = "#check" + checkID;
            $(this).remove();
            $(checkID).remove();
            var mssID = this.id.charAt(this.id.length - 1);
            var mssID = "#mss" + mssID;
            $(this).remove();
            $(mssID).remove();
        });
    });
});
</script>
<?php endif; ?>

<?php if ($type === 'result_upload') : ?>
<script>
$("#program_change").on("change", function(e) {
    var program_id = $("#program_change").val();
    $("#show_program").load("load_program.php?program_id=" + program_id);
});
</script>
<?php endif; ?>

<?php if ($type === 'allresultprint' || $type === 'questions' || $type === 'result') : ?>
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
    // console.log(divToPrint);
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
<?php endif; ?>
<?php if ($type === 'questions' || $type === 'show_ques' || $type === 'result' || $type === 'print_question') : ?>
<script>
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
    inlineMath: [ ['$','$'], ["\\(","\\)"] ],
    displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
    processEscapes: true,

},
"HTML-CSS": { fonts: ["TeX"] }
});
</script>
<script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML" async>
</script>
<?php endif; ?>
<!-- END PAGE LEVEL JS-->
</body>

</html>