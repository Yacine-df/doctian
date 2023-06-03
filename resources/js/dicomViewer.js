
import * as cornerstone from '@cornerstonejs/core';
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