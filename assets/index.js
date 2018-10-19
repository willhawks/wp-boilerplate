const cloudinary = require('cloudinary-core');
const cl = new cloudinary.Cloudinary({
  cloud_name: 'creative-distillery',
  secure: true
});

const navbar = document.getElementById('navbar');
const toggler = document.getElementById('navbarToggler');

toggler.addEventListener('click', () => {
  navbar.classList.toggle('open');
});

const notImage = document.querySelector('.future-leaf-image');
console.log({notImage});
const { url, alt } = notImage.dataset;
console.log(url);
const imageSrc = cl.url(url, {
  type: 'fetch',
  crop: 'fill',
  gravity: 'faces'
});
console.log(imageSrc);
const actualImage = document.createElement('img');
actualImage.src = imageSrc;
notImage.appendChild(actualImage);