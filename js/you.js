//you.js
//returns true if element passed as parameter is in viewport

// let isInViewport = function(ele){
//   let rect = ele.getBoundingClientRect();
//   x = rect.left;
//   y = rect.top;
//   w = rect.right - rect.left;
//   h = rect.bottom - rect.top;

//   //alert (" Left: " + x + "\n Top: " + y + "\n Width: " + w + "\n Height: " + h);
//   return 1;
// }
function svgdisplay(){
  var div = document.getElementById("svg-cover");
  var i= 5;
  console.log("before for");
  // debugger;
  for (i= 5; i>0; i-0.5){
    console.log("in for");
    div.style.height = i+"em";
  }
  // debugger;
  console.log("after for");
  if(i==0){
    div.style.display = "none";
  }
  console.log("If sTement has been executed");
}




// function drawSvg_head(){
//   let ele = document.querySelectorAll('svg')[0];
//   //svglist.forEach(function(ele){
//     if (isInViewport(ele)) {
//       setInterval(drawSvg(ele), 3000);
//   }
//   //});
// }

// //draw svg
// function drawSvg(ele){
//   console.log(1);
//   ele.setAttribute("style", "visibility: visible");
// }

// //draw svg1 if ele svg1 in viewport


//   window.addEventListener('scroll', drawSvg_head, false);


//Chat-form events
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}