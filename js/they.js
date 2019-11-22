//they.js

//checks if parameter is in viewport
var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};

window.addEventListener('scroll', function(){
  var svg1 = document.querySelector("#svg1");
  var svg2 = document.querySelector("#svg2");

  if(isInViewport(svg1)){
    svg1.classList.add("svg-container");
  }

  if(isInViewport(svg2)){
    svg2.classList.add("svg-container");
  }
});