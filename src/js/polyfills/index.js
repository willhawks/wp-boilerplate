import objectFitImages from 'object-fit-images';
import nodeListForEach from './nodeListForEach';
import arrayFrom from './arrayFrom';

function polyfills() {
  objectFitImages();
  nodeListForEach();
  // arrayFrom();
}

export default polyfills;