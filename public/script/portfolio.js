(function(){

  let volet = document.getElementsByClassName("volet");

  for (let i = 0; i < volet.length; i++)
  {
    volet[i].addEventListener("mouseenter", () => {
      volet[i].childNodes[1].style.opacity = 1;
    });
    volet[i].addEventListener("mouseleave", () => {
      volet[i].childNodes[1].style.opacity = 0;
    });
  }
})();
