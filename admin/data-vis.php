<?php
include "admin-header.php";
?>
<style>
    #admin-data-vis{
        width: 50%;
        margin: auto;
        background-color: lightsalmon;
        padding: 4%;
    }
</style>
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

<div id="admin-data-vis">
    <h1>Google Analytics</h1>
    <canvas id="the-canvas"></canvas>
</div>
<script>
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    var url = 'analytics.pdf';

    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

    // Asynchronous download of PDF
    var loadingTask = pdfjsLib.getDocument(url);
    loadingTask.promise.then(function(pdf) {
        console.log('PDF loaded');

        // Fetch the first page
        var pageNumber = 1;
        pdf.getPage(pageNumber).then(function(page) {
            console.log('Page loaded');

            var scale = 1.5;
            var viewport = page.getViewport(scale);

            // Prepare canvas using PDF page dimensions
            var canvas = document.getElementById('the-canvas');
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.then(function () {
                console.log('Page rendered');
            });
        });
    }, function (reason) {
        // PDF loading error
        console.error(reason);
    });
</script>


<img src="1.png" alt="analytics">
<img src="2.png" alt="analytics">
</div>