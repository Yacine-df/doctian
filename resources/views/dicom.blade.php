
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- style -->
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/dicomViewer.js'])
</head>

<body>
    <div class="container">
    
        <h1>
            imageloader/index.html
        </h1>
    
        This example shows a very simple ImageLoader which generates the image on the fly.  A real image loader
        would of course get the data form a server.  Note - the other live examples use a custom ImageLoader
        which have the pixel data for images stored in them as base64 encoded strings.
    
        <br>
        <br>
    
        <div id="dicomImage" style="width:512px;height:512px"
             oncontextmenu="return false"
             onmousedown="return false">
        </div>
    
    </div>
    </body>
<script >window.cornerstone || document.write('<script src="https://unpkg.com/cornerstone-core">\x3C/script>')</script>
<script>
    // Loads an image given an imageId
    function loadImage(imageId) {
        const width = 256;
        const height = 256;
        const numPixels = width * height;
        const pixelData = new Uint16Array(numPixels);
        const rnd = Math.round(Math.random() * 255);
        let index = 0;
        for (let y = 0; y < height; y++) {
            for (let x = 0; x < width; x++) {
                pixelData[index] = (x + rnd) % 256;
                index++;
            }
        }

        function getPixelData() {
            return pixelData;
        }

        const image = {
            imageId: imageId,
            minPixelValue: 0,
            maxPixelValue: 255,
            slope: 1.0,
            intercept: 0,
            windowCenter: 127,
            windowWidth: 256,
            render: cornerstone.renderGrayscaleImage,
            getPixelData: getPixelData,
            rows: height,
            columns: width,
            height: height,
            width: width,
            color: false,
            columnPixelSpacing: 1.0,
            rowPixelSpacing: 1.0,
            invert: false,
            sizeInBytes: width * height * 2
        };

        return {
          promise: new Promise((resolve) => resolve(image)),
          cancelFn: undefined
        }
    }

    cornerstone.registerImageLoader('myImageLoader', loadImage);

    // image enable the element
    const element = document.getElementById('dicomImage');
    cornerstone.enable(element);

    // load the image and display it
    const imageId = 'C:\Users\¨PC\Downloads\IMG_0149.jpg';
    cornerstone.loadImage(imageId).then(function(image) {
        cornerstone.displayImage(element, image);
    });
</script>